<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Category;
use App\incompleteOrder;
use App\Order;
use App\Settlement;
use App\Transaction;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback($reference)
    {
        try {
            //code...
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . $reference,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    "Authorization: Bearer sk_live_26c053458d1280b8222ce60839dd16d3c5f9ff5f",
                    "Cache-Control: no-cache",
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            $decode = json_decode($response, true);
            $customerName = $decode['data']['metadata']['custom_fields'][0]['value'];
            $customerEmail = $decode['data']['metadata']['custom_fields'][1]['value'];
            $customerPhone = $decode['data']['metadata']['custom_fields'][2]['value'];
            $amount = $decode['data']['amount'] / 100;
            $pickupRegion = $decode['data']['metadata']['custom_fields'][3]['value'];
            $pickupAddress = $decode['data']['metadata']['custom_fields'][4]['value'];
            $deliveryRegion = $decode['data']['metadata']['custom_fields'][5]['value'];
            $deliveryAddress = $decode['data']['metadata']['custom_fields'][6]['value'];
            $orderCategory = $decode['data']['metadata']['custom_fields'][7]['value'];
            $deliveryContactName = $decode['data']['metadata']['custom_fields'][8]['value'];
            $deliveryContactPhone = $decode['data']['metadata']['custom_fields'][9]['value'];
            $paymentType = $decode['data']['authorization']['channel'];
            $reference = $decode['data']['reference'];
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
                //code...
                $checkCustomer = Customer::where('phoneNumber', $customerPhone)->first();
                if ($checkCustomer) {
                    // get id
                    $customer_id = $checkCustomer->id;
                    // Get category id
                    $category = Category::where('name', $orderCategory)->firstOrFail();
                    $category_id = $category->id;
                    // Proccess order
                    $newOrder = new incompleteOrder();
                    $newOrder->uuid = Uuid::uuid4();
                    $newOrder->customer_id = $customer_id;
                    $newOrder->category_id = $category_id;
                    $newOrder->pickupRegion = $pickupRegion;
                    $newOrder->pickupAddress = $pickupAddress;
                    $newOrder->deliveryRegion = $deliveryRegion;
                    $newOrder->deliveryAddress = $deliveryAddress;
                    $newOrder->deliveryContactName = $deliveryContactName;
                    $newOrder->deliveryContactPhone = $deliveryContactPhone;
                    $newOrder->amountPaid = $amount;
                    $newOrder->paymentType = $paymentType;
                    $newOrder->trackingId = $trackingId;
                    $newOrder->reference = $reference;
                    $newOrder->save();
                    return redirect('/')->with('success', 'Order Successful!');
                } else {
                    try {
                        //code...
                        $newCustomer = new Customer();
                        $newCustomer->uuid = Uuid::uuid4();
                        $newCustomer->fullname = $customerName;
                        $newCustomer->email = $customerEmail;
                        $newCustomer->phoneNumber = $customerPhone;
                        $newCustomer->save();
                        // Get ids
                        $category = Category::where('name',  $orderCategory)->firstOrFail();
                        $category_id = $category->id;
                        $customer_id = $newCustomer->id;
                        // Proccess order
                        $newOrder = new incompleteOrder();
                        $newOrder->uuid = Uuid::uuid4();
                        $newOrder->customer_id = $customer_id;
                        $newOrder->category_id = $category_id;
                        $newOrder->pickupRegion = $pickupRegion;
                        $newOrder->pickupAddress = $pickupAddress;
                        $newOrder->deliveryRegion = $deliveryRegion;
                        $newOrder->deliveryAddress = $deliveryAddress;
                        $newOrder->deliveryContactName = $deliveryContactName;
                        $newOrder->deliveryContactPhone = $deliveryContactPhone;
                        $newOrder->amountPaid = $amount;
                        $newOrder->paymentType = $paymentType;
                        $newOrder->trackingId = $trackingId;
                        $newOrder->reference = $reference;
                        $newOrder->save();
                        return redirect('/')->with('success', 'Order Successful!');
                    } catch (\Throwable $th) {
                        throw $th;
                    }
                }
            } catch (\Throwable $th) {
                throw $th;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function customerGatewayCallback($ref)
    {
        $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . $ref,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/json",
                    // "Authorization: Bearer sk_test_ff3a8ca11cc7f69d32fd07eb56cde367ac421938",
                    "Authorization: Bearer sk_live_26c053458d1280b8222ce60839dd16d3c5f9ff5f",
                    "Cache-Control: no-cache",
                ),
            ));

            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            $decode = json_decode($response, true);
            $customerId = $decode['data']['metadata']['custom_fields'][0]['value'];
            $orderId = $decode['data']['metadata']['custom_fields'][1]['value'];
            $amount = $decode['data']['amount'] / 100;
            $paymentType = $decode['data']['authorization']['channel'];
            $reference = $decode['data']['reference'];
            $source = "Customer";
            $description = "Pending payment";
            $transactionDate = date("d-m-Y");
            $status = "Successful";
            /**
             * Get order by id
             * Update the order and set is_paid to 1
             * Deduct user balnce from settlement
             * Add order to transaction
             */

            try {
                $order = Order::find($orderId);
                if($order){
                    $isPaid = 1;
                    $order->amountPaid = $amount;
                    $order->paymentType = $paymentType;
                    $order->is_paid = $isPaid;
                    $order->save();
                    try {
                        //Increment user amount paid and decrement balance
                        $getSettlement = Settlement::where('user_id', $customerId)->firstOrFail();
                        $getSettlement->increment('amountPaid', $amount);
                        $getSettlement->decrement('balance', $amount);
                        // Add order to transaction
                        try {
                            //code...
                            $transaction = new Transaction();
                            $transaction->uuid = Uuid::uuid4();
                            $transaction->order_id = $orderId;
                            $transaction->reference = $reference;
                            $transaction->amount = $amount;
                            $transaction->paymentType = $paymentType;
                            $transaction->status = $status;
                            $transaction->source = $source;
                            $transaction->description = $description;
                            $transaction->transactionDate = $transactionDate;
                            $transaction->save();
                            return redirect('/dashboard')->with('success', 'Payment Successful!');
                        } catch (\Throwable $th) {
                            throw $th;
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