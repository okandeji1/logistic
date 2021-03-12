<?php

namespace App\Http\Controllers;

use App\Order;
use App\Customer;
use App\Category;
use App\Rider;
use App\Reason;
use App\incompleteOrder;
use Illuminate\Http\Request;
use Ramsey\Uuid\Uuid;
use PHPMailer\PHPMailer\PHPMailer;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            //code...
            $orders = Order::orderBy('created_at', 'desc')->paginate(20);
            return response()->json(['success', $orders], 200);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['error' => 'An error occur while loading this page']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        try {
            //code...
            $categories = Category::all();
            $customers = Customer::all();
            $riders = Rider::all();
            return response()->json(['categories' => $categories, 'riders' => $riders, 'customers' => $customers]);
        } catch (\Throwable $th) {
            //throw $th;
        }
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
            'customerName' => 'required',
            'customerEmail' => 'required|email',
            'customerPhone' => 'required|numeric',
            'orderCategory' => 'required',
            'pickupRegion' => 'required',
            'pickupAddress' => 'required',
            'deliveryRegion' => 'required',
            'deliveryAddress' => 'required',
            'deliveryContactName' => 'required',
            'deliveryContactPhone' => 'required|numeric',
            'estimatedAmount' => 'required|numeric',
            'amountPaid' => 'required|numeric',
            'paymentType' => 'required',
            'assignedRider' => 'required',
        ]);

        $customerName = $request->customerName;
        $customerEmail = $request->customerEmail;
        $customerPhone = $request->customerPhone;
        $orderCategory = $request->orderCategory;
        $pickupRegion = $request->pickupRegion;
        $pickupAddress = $request->pickupAddress;
        $deliveryRegion = $request->deliveryRegion;
        $deliveryAddress = $request->deliveryAddress;
        $deliveryContactName = $request->deliveryContactName;
        $deliveryContactPhone = $request->deliveryContactPhone;
        $estimatedAmount = $request->estimatedAmount;
        $amountPaid = $request->amountPaid;
        $paymentType = $request->paymentType;
        $assignedRider = $request->assignedRider;
        // Codes
        $coachCode = 'C';
        $stateCode = 'LA';
        $areaCode = 01;
        $deliveryCode = 20;
        $date = 02;
        $month = 'JL';
        $genCode = rand(0, 1000);
        // Generate trackingId
        $trackingId = $coachCode . $stateCode . $areaCode . $deliveryCode . $date . $month . $genCode;
        try {
            //Get customer by name
            $customer = customer::where('fullname', '=', $customerName)->firstOrFail();
            $customer_id = $customer->id;
            // Get category id
            $category = Category::where('name', '=', $orderCategory)->firstOrFail();
            $category_id = $category->id;
            // Get rider id
            $rider = Rider::where('fullname', '=', $assignedRider)->firstOrFail();
            $rider_id = $rider->id;
            // Proccess order
            $newOrder = new Order();
            $newOrder->uuid = Uuid::uuid4();
            $newOrder->customer_id = $customer_id;
            $newOrder->customerEmail = $customerEmail;
            $newOrder->customerPhone = $customerPhone;
            $newOrder->orderCategory = $orderCategory;
            $newOrder->pickupRegion = $pickupRegion;
            $newOrder->pickupAddress = $pickupAddress;
            $newOrder->deliveryRegion = $deliveryRegion;
            $newOrder->deliveryAddress = $deliveryAddress;
            $newOrder->deliveryContactName = $deliveryContactName;
            $newOrder->deliveryContactPhone = $deliveryContactPhone;
            $newOrder->estimatedAmount = $estimatedAmount;
            $newOrder->amountPaid = $amountPaid;
            $newOrder->trackingId = $trackingId;
            $newOrder->paymentType = $paymentType;
            // $newOrder->status = 'Successful';
            $newOrder->category_id = $category_id;
            $newOrder->rider_id = $rider_id;
            $newOrder->save();
            // Send mail to the customer
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.eu.mailgun.org';
            $mail->SMTPAuth = true;
            $mail->Username = 'postmaster@thecoachexpress.com';
            $mail->Password = '16cb89a900b7a01fc97eb02bc0823020-a83a87a9-e27573ab';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;          // Port->2525
            $mail->From = 'info@thecoachexpress.com';
            $mail->FromName = 'Coach Express';
            $mail->addReplyTo('info@thecoachexpress.com', 'Coach Admin');
            $mail->addAddress($customerEmail, $customerEmail);
            $mail->isHTML(true);
            // Mail content
            $mailContent = "<h1>Thank you for requesting a delivery</h1>
            <p>This is your tracking ID <h3>{$trackingId}</h3>. Please use this ID to track your order status.
            <p>Thank you.</p>
            <p>Regards,</p>
            <p>The Coach Express</p></p>";
            $mail->Subject = 'Your Delivery Request Tracking ID';
            $mail->Body = $mailContent;
            $mail->AltBody = "Hello, {$customerName}! \n How are you?";
            // Debug
            // $mail->SMTPDebug = 2;
            try {
                // Send mail
                $mail->send();
                return response()->json(['success ' => 'Order created successfully! Mail has been sent to ' . $customerEmail]);
            } catch (\Throwable $th) {
                //throw $th;
                return response()->json(['error' => 'Unable to complete order' . $th]);
            }
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json(['error ' => 'Error creating order' . $th]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        try {
            //code...
            $orders = Order::orderBy('created_at', 'desc')->paginate(10);
            return response()->json(['success' => $orders]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit($uuid)
    {
        try {
            //code...
            $order = Order::where('uuid', $uuid)->first();
            return response()->json(['success' => $order]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Mark order as completed
     */

    public function completeOrder(Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);
        $id = $request->id;
        $status = 'Completed';
        try {
            //code...
            $order = Order::find($id);
            // Get customer email
            $customerEmail = $order->customerEmail;
            $order->status = $status;
            $order->save();
            // Send notification to customer to close order
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.eu.mailgun.org';
            $mail->SMTPAuth = true;
            $mail->Username = 'postmaster@thecoachexpress.com';
            $mail->Password = '16cb89a900b7a01fc97eb02bc0823020-a83a87a9-e27573ab';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;          // Port->2525
            $mail->From = 'info@thecoachexpress.com';
            $mail->FromName = 'Coach Express';
            $mail->addReplyTo('info@thecoachexpress.com', 'Coach Admin');
            $mail->addAddress($customerEmail, $customerEmail);

            $mail->isHTML(true);
            // Mail content
            $mailContent = "<h1>Thank you for requesting a delivery</h1>
            <p>This is to inform you that your delivery request is now completed. The order is now closed.</p>
            <p>Thank you.</p>
            <p>Regards,</p>
            <p>The Coach Express</p></p>";
            $mail->Subject = 'Delivery Request Status';
            $mail->Body = $mailContent;
            $mail->AltBody = "Hello, {$order->customer->fullname}! \n How are you?";
            // Debug
            // $mail->SMTPDebug = 2;
            try {
                // Send mail
                $mail->send();
                return response()->json('Order marked as completed! A notification has been sent to ' . $customerEmail);
            } catch (\Throwable $th) {
                //throw $th;
                return response()->json('Unable to complete order' . $mail->ErrorInfo);
            }
        } catch (\Throwable $th) {
            return response()->json('Unable to complete order' . $th);
            throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Request $request)
    {
        $this->validate($request, [
            'status' => 'required',
            'id' => 'required',
        ]);

        $id = $request->id;
        $status = $request->status;
        try {
            //code...
            $order = Order::find($id);
            $order->status = $status;
            $order->save();
            return response()->json(['success ' => 'Order status updated successfully']);
        } catch (\Throwable $th) {
            return response()->json(['error ' => 'Unable to update status' . $th]);
            //throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required',
            'id' => 'required'
        ]);
        $comment = $request->comment;
        $id = $request->id;
        $deleteOrder = Order::find($id);
        if ($deleteOrder) {
            $orderId = $deleteOrder->id;
            $reason = new Reason();
            $reason->uuid = Uuid::uuid4();
            $reason->order_id = $orderId;
            $reason->comment = $comment;
            $reason->save();
            $deleteOrder->delete();
            return response()->json('success ', 'Order deleted successfully');
        } else {
            return response()->json('error ', 'Unable to delete order');
        }
    }

    /**
     * Get deleted resource
     */
    public function deletedOrders()
    {
        try {
            //code...
            $deletedOrders = Order::onlyTrashed()->orderBy('deleted_at', 'desc')->paginate(20);
            return response()->json(['success' => $deletedOrders]);
        } catch (\Throwable $th) {
            //throw $th;
            return response()->json_encode(['error ' => 'An error occur while loading this page']);
        }
    }

    /**
     * Deleted resource details
     */
    public function deletedOrderDetails($uuid)
    {
        try {
            //code...
            $deletedOrder = Order::onlyTrashed()->where('uuid', $uuid)->firstOrFail();
            return response()->json(['success' => $deletedOrder]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function assignRiderToIncompleteOrder(Request $request)
    {
        $this->validate($request, [
            'rider' => 'required',
            'id' => 'required'
        ]);
        $id = $request->id;
        $assignedRider = $request->rider;
        try {
            //code...
            $incompleteOrder = incompleteOrder::find($id);
            if ($incompleteOrder) {
                // Collect data
                $customer_id = $incompleteOrder->customer->id;
                $customerName = $incompleteOrder->customer->fullname;
                $customerEmail = $incompleteOrder->customer->email;
                $customerPhone = $incompleteOrder->customer->phoneNumber;
                $orderCategory = $incompleteOrder->category->name;
                $category_id = $incompleteOrder->category->id;
                $pickupRegion = $incompleteOrder->pickupRegion;
                $pickupAddress = $incompleteOrder->pickupAddress;
                $deliveryRegion = $incompleteOrder->deliveryRegion;
                $deliveryAddress = $incompleteOrder->deliveryAddress;
                $deliveryContactName = $incompleteOrder->deliveryContactName;
                $deliveryContactPhone = $incompleteOrder->deliveryContactPhone;
                $estimatedAmount = $incompleteOrder->amountPaid;
                $amountPaid = $incompleteOrder->amountPaid;
                $paymentType = $incompleteOrder->paymentType;
                $trackingId = $incompleteOrder->trackingId;
                // Set it to complete
                $isComplete = 1;
                $incompleteOrder->is_complete = $isComplete;
                $incompleteOrder->save();
                try {
                    // Get rider id
                    $rider = Rider::where('fullname', '=', $assignedRider)->firstOrFail();
                    $rider_id = $rider->id;
                    // Add incomplete order to order table
                    $newOrder = new Order();
                    $newOrder->uuid = Uuid::uuid4();
                    $newOrder->customer_id = $customer_id;
                    $newOrder->rider_id = $rider_id;
                    $newOrder->category_id = $category_id;
                    $newOrder->customerEmail = $customerEmail;
                    $newOrder->customerPhone = $customerPhone;
                    $newOrder->orderCategory = $orderCategory;
                    $newOrder->pickupRegion = $pickupRegion;
                    $newOrder->pickupAddress = $pickupAddress;
                    $newOrder->deliveryRegion = $deliveryRegion;
                    $newOrder->deliveryAddress = $deliveryAddress;
                    $newOrder->deliveryContactName = $deliveryContactName;
                    $newOrder->deliveryContactPhone = $deliveryContactPhone;
                    $newOrder->estimatedAmount = $estimatedAmount;
                    $newOrder->amountPaid = $amountPaid;
                    $newOrder->trackingId = $trackingId;
                    $newOrder->paymentType = $paymentType;
                    $newOrder->save();
                    // Send mail to the customer
                    $mail = new PHPMailer();
                    $mail->isSMTP();
                    $mail->Host = 'smtp.eu.mailgun.org';
                    $mail->SMTPAuth = true;
                    $mail->Username = 'postmaster@thecoachexpress.com';
                    $mail->Password = '16cb89a900b7a01fc97eb02bc0823020-a83a87a9-e27573ab';
                    $mail->SMTPSecure = 'tls';
                    $mail->Port = 587;          // Port->2525
                    $mail->From = 'info@thecoachexpress.com';
                    $mail->FromName = 'Coach Express';
                    $mail->addReplyTo('info@thecoachexpress.com', 'Coach Admin');
                    $mail->addAddress($customerEmail, $customerEmail);
                    $mail->isHTML(true);
                    // Mail content
                    $mailContent = "<h1>Thank you for requesting a delivery</h1>
                    <p>This is your tracking ID <h3>{$trackingId}</h3>. Please use this ID to track your order status.
                    <p>Thank you.</p>
                    <p>Regards,</p>
                    <p>The Coach Express</p>";
                    $mail->Subject = 'Your Delivery Request Tracking ID';
                    $mail->Body = $mailContent;
                    $mail->AltBody = "Hello, {$customerName}! \n How are you?";
                    // Debug
                    // $mail->SMTPDebug = 2;
                    try {
                        // Send mail
                        $mail->send();
                        return response()->json(['success' => 'Mail has been sent to ' . $customerEmail]);
                    } catch (\Throwable $th) {
                        //throw $th;
                        return response()->json(['error' => 'Unable to complete order' . $th]);
                    }
                } catch (\Throwable $th) {
                    throw $th;
                }
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}