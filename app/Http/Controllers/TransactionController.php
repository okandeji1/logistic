<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Customer;
use App\Order;
use Auth;
use Ramsey\Uuid\Uuid;
use Illuminate\Http\Request;
use PDF;
use PHPMailer\PHPMailer\PHPMailer;
use Dompdf\Dompdf;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/auth-login');
        }
        try {
            //code...
            $transactions = Transaction::orderBy('created_at', 'desc')->paginate(20);
            return view('pages.transaction.all_transaction')->with('transactions', $transactions);
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
    public function create($uuid)
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/auth-login');
        }

        try {
            // Get order details
            $order = Order::where('uuid', $uuid)->firstOrFail();
            return view('pages.transaction.generate_transaction')->with('order', $order);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', 'An error occur while loading this page' . $th);
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
            // 'customerId' => 'required',
            'orderId' => 'required',
            'reference' => 'required',
            'amount' => 'required',
            'status' => 'required',
            'paymentType' => 'required',
            'transactionDate' => 'required'
        ]);

        // $customerId = $request->customerId;
        $orderId = $request->orderId;
        $reference = $request->reference;
        $amount = $request->amount;
        $description = $request->description;
        $status = $request->status;
        $transactionDate = $request->transactionDate;
        $paymentType = $request->paymentType;
        try {
            //Get customer by name
            // $customer = Customer::where('uuid', $customerId)->firstOrFail();
            // $customer_id = $customer->id;
            // Get order id
            $order = Order::where('uuid', $orderId)->firstOrFail();
            $order_id = $order->id;
            // Proccess Transaction
            $transaction = new Transaction();
            $transaction->uuid = Uuid::uuid4();
            // $transaction->customer_id = $customer_id;
            $transaction->order_id = $order_id;
            $transaction->reference = $reference;
            $transaction->amount = $amount;
            $transaction->description = $description;
            $transaction->transactionDate = $transactionDate;
            $transaction->paymentType = $paymentType;
            $transaction->status = $status;
            $transaction->save();
            return redirect('/all-transactions')->with('success', 'Transaction created successfully');
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', 'An error occur while loading this page' . $th);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
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
            $transaction = Transaction::where('uuid', $uuid)->first();
            return view('pages.transaction.transaction_details')->with('transaction', $transaction);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', 'An error occur while loading this page' . $th);
        }
    }

    /**
     * Generate receipt for transaction
     */
    public function generateReceipt($uuid)
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/auth-login');
        }
        try {
            //code...
            $transaction = Transaction::where('uuid', $uuid)->first();
            return view('pages.receipt.generate_receipt')->with('transaction', $transaction);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', 'An error occur while loading this page' . $th);
        }
    }

    public function sendReceipt($uuid)
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/auth-login');
        }
        try {
            //code...
            $transaction = Transaction::where('uuid', $uuid)->first();
            $customerEmail = $transaction->order->customerEmail;
            // Convert to pdf
            $pdf = PDF::loadView('pages.receipt.generate_receipt', compact('transaction', $transaction));

            // Send mail to the customer
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.eu.mailgun.org';
            $mail->SMTPAuth = true;
            $mail->Username = 'postmaster@thecoachexpress.com';
            $mail->Password = '16cb89a900b7a01fc97eb02bc0823020-a83a87a9-e27573ab';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;          // Port->2525
            $mail->isHTML(true);
            $mail->From = 'info@thecoachexpress.com';
            $mail->FromName = 'Coach Express';
            // Receipients
            $mail->addReplyTo('info@thecoachexpress.com', 'Coach Admin');
            $mail->addAddress($customerEmail, $customerEmail);
            // Attachment
            $mail->addAttachment($pdf->output(), 'receipt.pdf');
            // Mail content
            $mailContent = "<h1>Thank you for requesting a delivery</h1>
            <p>This is to tell you that your receipt is ready. Please find attachment below.</p>
            <p>Thank you.</p>
            <p>Regards,</p>
            <p>The Coach Express</p>";
            $mail->Subject = 'Order receipt';
            $mail->Body = $mailContent;
            // Debug
            // $mail->SMTPDebug = 2;
            try {
                //code...
                $mail->send();
                return redirect('/view-receipts')->with('success', 'Receipt sent to ' . $customerEmail);
            } catch (\Throwable $th) {
                throw $th;
            }
        } catch (\Throwable $th) {
            throw $th;
            // return back()->with('error', 'An error occur while loading this page'.$th);
        }
    }

    public function viewReceipts()
    {
        if (Auth::guest()) {
            //is a guest so redirect
            return redirect('/auth-login');
        }
        try {
            //code...
            $status = 'Successful';
            $transactions = Transaction::where('status', $status)->get();
            return view('pages.receipt.view_receipts')->with('transactions', $transactions);
        } catch (\Throwable $th) {
            //throw $th;
            return back()->with('error', 'An error occur while loading this page' . $th);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}