<?php

//namespace App\Http\Controllers;
//use Illuminate\Http\Request;
//use App\Http\Requests;
use Mail;
//use App\Mail\Reminder;

//class MailController extends Controller


    /**
     * Send Reminder E-mail Example
     *
     * @return void
     */
     function welcomeMail()
    {
        $to_email = 'ram@vahaitech.com';
        Mail::to($to_email)->send(new Reminder);
        return "E-mail has been sent Successfully";  
    }
    
