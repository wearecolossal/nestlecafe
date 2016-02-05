<?php

namespace App\Http\Controllers;

use App\Cafe;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class EmailController extends Controller
{
    /**
     * @var Cafe
     */
    private $cafe;

    /**
     * EmailController constructor.
     * @param Cafe $cafe
     */
    public function __construct(Cafe $cafe)
    {
        $this->cafe = $cafe;
    }


    /**
     * @return string
     */
    public function sendContact(Request $request)
    {

        $rules = [
            'name'     => 'required',
            'email'    => 'required',
            'subject'  => 'required',
            'comments' => 'required'
        ];

        $input = $request->all();
        $validation = Validator::make($input, $rules);

        if ($validation->passes()) {
            $location = null;
            if ($request['store']) {
                $location = $this->cafe->find($request['store']);
            }
            $message = [
                'name'     => $request['name'],
                'email'    => $request['email'],
                'subject'  => $request['subject'],
                'location' => $location,
                'comments' => $request['comments']
            ];
            Mail::send('emails.contact', $message, function ($m) use ($message)
            {
                $m->from('marketing@nestlecafe.com', 'Nestlecafe');

                $m->to('tarun@colossal.net', 'Tarun Krishnan')->subject('A customer has submitted to the Nestl&eacute;&reg; Toll House&reg; Caf&eacute; By Chip Contact Form');
                //$m->to('info@nestlecafe.com', 'Nestlé Toll House Café By Chip')->subject('A customer has submitted to the Nestl&eacute;&reg; Toll House&reg; Caf&eacute; By Chip Contact Form');
            });
            return response()->json(['success']);
        }
        return response()->json(['error']);
    }
}
