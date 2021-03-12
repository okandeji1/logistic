<?php

namespace App\Http\Controllers;
use App\Category;
use App\Order;
use App\Settlement;
use App\Transaction;
use App\SLA;
use App\Fund;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Auth;

class SiteController extends Controller
{
    public function index()
    {
        try {
            //code...
            $categories = Category::all();
            return view('site.index')->with('categories', $categories);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function dashboard()
    {
        if (Auth::guest()){
            //is a guest so redirect
            return redirect('/');
        }
        try {
            //code...
            $userId = Auth::user()->id;
            $sum = Order::where('user_id', $userId)
                ->get()
                ->sum('estimatedAmount');
            $balance = Settlement::where('user_id', $userId)->get()->sum('balance');
            $amountPaid = Settlement::where('user_id', $userId)->get()->sum('amountPaid');
            $categories = Category::all();
            return view('site.dashboard', compact(['categories', $categories, 'sum', $sum, 'balance', $balance, 'amountPaid', $amountPaid]));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function about()
    {
        try {
            //code...
            $categories = Category::all();
            return view('site.about')->with('categories', $categories);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function contact()
    {
        try {
            //code...
            $categories = Category::all();
            return view('site.contact')->with('categories', $categories);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function offer()
    {
        try {
            //code...
            $categories = Category::all();
            return view('site.offer')->with('categories', $categories);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function checkOrderStatus(Request $request)
    {
        $this -> validate($request, [
            'q' => 'required',
        ]);

        $searchTerm = $request->q;
        $order = Order::query()
        ->where('trackingId', 'LIKE', $searchTerm, )
        ->get();

        if (count($order) > 0) {
            return Response::json($order);
        } else {
            return Response::json([
                "status" => 404,
                "message" => "No details found. Try to search again with different query"
                ]);
        }
    }

    public function myOrder()
    {
        if (Auth::guest()){
            //is a guest so redirect
            return redirect('/');
        }
        try {
            //code...
            $userId = Auth::user()->id;
            $myOrders = Order::where('user_id', $userId)->orderBy('created_at', 'desc')->paginate(20);
            $sum = Order::where('user_id', $userId)
                ->get()
                ->sum('estimatedAmount');
               
            $categories = Category::all();
            return view('site.order', compact(['categories', $categories, 'myOrders', $myOrders, 'sum', $sum,]));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function transaction()
    {
        if (Auth::guest()){
            //is a guest so redirect
            return redirect('/');
        }
        try {
            //code...
            $userId = Auth::user()->id;
            $notPaid = 0;
            $myOrders = Order::where('user_id', $userId)->orderBy('created_at', 'desc')->paginate(20);
            $unPaidOrders = Order::where('user_id', $userId)->where('is_paid', $notPaid)->orderBy('created_at', 'desc')->paginate(20);
            $balance = Settlement::where('user_id', $userId)->get()->sum('balance');
            $amountPaid = Order::where('user_id', $userId)->get()->sum('amountPaid'); // Total payment
           
            $categories = Category::all();
            return view('site.transaction', compact(['categories', $categories, 'myOrders', $myOrders, 'balance', $balance, 'unPaidOrders', $unPaidOrders, 'amountPaid', $amountPaid,]));
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    /**
     * Listing of paid transactions
     */
    public function paidOrders()
    {
        if (Auth::guest()){
            //is a guest so redirect
            return redirect('/');
        }
        try {
            //code...
            $userId = Auth::user()->id;
            $isPaid = 1;
            $paidOrders = Order::where('user_id', $userId)->where('is_paid', $isPaid)->orderBy('created_at', 'desc')->paginate(20);
            $balance = Settlement::where('user_id', $userId)->get()->sum('balance');
            $amountPaid = Order::where('user_id', $userId)->get()->sum('amountPaid'); // Total payment
           
            $categories = Category::all();
            return view('site.paid_orders', compact(['categories', $categories, 'balance', $balance, 'paidOrders', $paidOrders, 'amountPaid', $amountPaid,]));
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    // Generate receipt for a particular order
    public function receipt($uuid)
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/');
        }
        /**
         * get order id
         */
        try {
            //code...
            $order = Order::where('uuid', $uuid)->firstOrFail();
            $order_id = $order->id;
            $transaction = Transaction::where('order_id', $order_id)->first();
            $categories = Category::all();
            return view('site.generate_receipt', compact(['categories', $categories, 'transaction', $transaction]));
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', ' Internal server error');
        }
    }

    public function distanceMatrix(Request $request)
    {
        $this->validate($request, [
            'origin' => 'required',
            'destination' => 'required',
        ]);
        $origin = str_replace(' ', '+', $request->origin);
        $destination = str_replace(' ', '+', $request->destination);
        try {
            //code...
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$origin."&destinations=".$destination."&key=AIzaSyAjw1oBypctNLeIyKr1e8XBoSFmi88Z3bQ",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "Cache-Control: no-cache",
                ),
            ));
            
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            $decode = json_decode($response, true);
            return response()->json($decode, 200);
        }catch (\Throwable $th) {
            throw $th;
        }
        
    }

    public function payment(Request $request)
    {
        $id = $request->id;
        try {
            //code...
            $order = Order::find($id);
            if($order){
                // Get order details
                return response()->json($order);
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
