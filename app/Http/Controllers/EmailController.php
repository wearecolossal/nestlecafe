<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * @return string
     */
    public function sendContact()
    {
        /*
             * Mail Ticket
             */
        $mailDataArray = [
            'first_name'    => 'test'
        ];
        $mailData = $mailDataArray;
        Mail::send('emails.test', $mailDataArray, function ($message) use ($mailData) {
            $message->to('tarun@colossal.net', 'Tarun Krishnan')->subject('testing');
        });
        return "sent";
    }
}
