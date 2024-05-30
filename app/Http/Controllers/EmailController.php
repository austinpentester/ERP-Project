<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    //

    public function sendEmail()
    {
        $toEmail="sakthivel8sakthi@gmail.com";
        $message="Hi Hello";
        $subject="Laravel Link";

        $responce=Mail::to($toEmail)->send(new SendMail($message,$subject));
        dd($responce);
    }
}
