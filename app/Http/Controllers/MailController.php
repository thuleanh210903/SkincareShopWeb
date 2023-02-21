<?php

namespace App\Http\Controllers;
use App\Mail\DemoMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
class MailController extends Controller
{
    public function index()
    {
        $mailData = [
            'title' => 'Mail from Web-tuts.com',
            'body' => 'This is for testing email using smtp.'
        ];

        Mail::to('your_email@gmail.com')->send(new DemoMail($mailData));

        // dd("Email is sent successfully.");
    }
    //
}
