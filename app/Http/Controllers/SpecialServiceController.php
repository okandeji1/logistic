<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;

class SpecialServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
            $mail->addAddress('support@thecoachexpress.com', 'support@thecoachexpress.com');
            $mail->isHTML(true);
            // Mail content
            $mailContent = "<h1>Dear Coach Admin</h1>
            <p>You have a new contact request from thecoachexpress.com website. Please see information below</br>
            <div>
                <p><h4>Fullname: $request->fullname;</h4> </br></p>
                <p><h4>Email: $request->email;</h4> </br></p>
                <p><h4>Phone: $request->phone ? $request->phone : '' ;</h4> </br></p>
                <p><h4>Message: $request->message ? $request->message : '' ;</h4> </br></p>
                <p><h4>Service: $request->service ? $request->service : '' ;</h4> </br></p>
                
            </div>

            <p>Thank you.</p>
            <p>Regards,</p>
            <p>The Coach Express</p>";
            $mail->Subject = 'New Special Request';
            $mail->Body = $mailContent;
            $mail->AltBody = "Hello, Admin! \n How are you?";

            try {
                $sendEmail = $mail->send();

                if ($sendEmail){
                    return back()->with('success', 'Email sent to Coach Admin');
                }

            }catch (\Throwable $th){
                //throw $th;
                return back()->with('error', 'An error occur while sending email '.$th);

            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}