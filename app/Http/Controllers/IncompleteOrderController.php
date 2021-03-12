<?php

namespace App\Http\Controllers;

use App\incompleteOrder;
use App\Rider;
use App\Customer;
use App\Category;
use App\Settlement;
use App\SLA;
use Auth;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class IncompleteOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guest()){
            //is a guest so redirect
            return redirect('/auth-login');
        }
        try {
            //code...
            $notCompleted = 0;
            $incompleteOrders = incompleteOrder::where('is_complete', $notCompleted)->orderBy('created_at', 'desc')->paginate(20);
            return view('pages.order.incomplete_order')->with('incompleteOrders', $incompleteOrders);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with(['error' => 'An error occur while loading this page']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'orderCategory' => 'required',
            'pickupRegion' => 'required',
            'pickupAddress' => 'required',
            'deliveryRegion' => 'required',
            'deliveryAddress' => 'required',
            'deliveryContactName' => 'required',
            'deliveryContactPhone' => 'required|numeric',
            'estimatedAmount' => 'required|numeric',
        ]);
        $estimatedAmount = $request->estimatedAmount;
        $pickupRegion = $request->pickupRegion;
        $pickupAddress = $request->pickupAddress;
        $deliveryRegion = $request->deliveryRegion;
        $deliveryAddress = $request->deliveryAddress;
        $orderCategory = $request->orderCategory;
        $deliveryContactName = $request->deliveryContactName;
        $deliveryContactPhone = $request->deliveryContactPhone;
        $paymentType = "Subscription";
        $reference = rand(0, 999999);
        // Codes
        $coachCode = 'C';
        $stateCode = 'LA';
        $areaCode = 01;
        $deliveryCode = 20;
        $date = 02;
        $month = 'JL';
        $genCode = rand(0, 1000);
        
        // Generate trackingId
        $trackingId = $coachCode.$stateCode.$areaCode.$deliveryCode.$date.$month.$genCode;
        try {
            //code...
            // get id
            $customer_id = Auth::user()->id;
            // Get category id
            $category = Category::where('name', $orderCategory)->firstOrFail();
            $category_id = $category->id;
            $newOrder = new incompleteOrder();
            /**
             * Check if user is a sla client
             * orders be deducted from the SLA balance, when credit balance is
             *less than amount required for the order. It should switch to the normal payment process,
             */
            if(Auth::user()->is_sla){
                // Get user balance from sla table
                $sla = SLA::where('user_id', $customer_id)->firstOrFail();
                $balance = $sla->balance;
                if($balance > $estimatedAmount){
                    // User have enough balance to complete order
                    $sla->decrement('balance', $estimatedAmount);
                    $newOrder->amountPaid = $estimatedAmount;
                }else {
                    // Use the normal process
                    /**
                     * Check if user exist in settlement collection
                     */
                    $getSettlement = Settlement::where('user_id', $customer_id)->firstOrFail();
                    if($getSettlement){
                        $getSettlement->increment('balance', $estimatedAmount);
                    }else {
                        $newSettlement = new Settlement();
                        $newSettlement->uuid = Uuid::uuid4();
                        $newSettlement->user_id = $customer_id;
                        $newSettlement->balance = $estimatedAmount;
                        $newSettlement->save();
                    }
                }
            }else {
                /**
                 * User is not sla client
                 * Check if user exist in settlement collection
                 */
                $getSettlement = Settlement::where('user_id', $customer_id)->firstOrFail();
                if($getSettlement){
                    $getSettlement->increment('balance', $estimatedAmount);
                }else {
                    $newSettlement = new Settlement();
                    $newSettlement->uuid = Uuid::uuid4();
                    $newSettlement->user_id = $customer_id;
                    $newSettlement->balance = $estimatedAmount;
                    $newSettlement->save();
                }
            }
            
            
            // Proccess order
            $newOrder->uuid = Uuid::uuid4();
            $newOrder->user_id = $customer_id;
            $newOrder->category_id = $category_id;
            $newOrder->pickupRegion = $pickupRegion;
            $newOrder->pickupAddress = $pickupAddress;
            $newOrder->deliveryRegion = $deliveryRegion;
            $newOrder->deliveryAddress = $deliveryAddress;
            $newOrder->deliveryContactName = $deliveryContactName;
            $newOrder->deliveryContactPhone = $deliveryContactPhone;
            $newOrder->estimatedAmount = $estimatedAmount;
            $newOrder->paymentType = $paymentType;
            $newOrder->trackingId = $trackingId;
            $newOrder->reference = $reference;
            $newOrder->save();
            // Add to customer balance
            return response()->json(['success', ' Order Successfully created!']);
        } catch (\Throwable $th) {
            throw $th;
            // return response()->json(['error', ' Internal server error!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\incompleteOrder  $incompleteOrder
     * @return \Illuminate\Http\Response
     */
    public function show(incompleteOrder $incompleteOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\incompleteOrder  $incompleteOrder
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/auth-login');
        }
        try {
            //code...
            $riders = Rider::all();
            $incompleteOrder = incompleteOrder::where('uuid' ,$uuid)->first();
            return view('pages.order.incomplete_order_details', compact('incompleteOrder', $incompleteOrder, 'riders', $riders));
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\incompleteOrder  $incompleteOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, incompleteOrder $incompleteOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\incompleteOrder  $incompleteOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(incompleteOrder $incompleteOrder)
    {
        //
    }
}