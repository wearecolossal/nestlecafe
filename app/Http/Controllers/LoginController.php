<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    /**
     * @var User
     */
    private $user;


    /**
     * LoginController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']], true)) {
            $user = User::where('email', $request['email'])->first();
            Auth::login($user, true);
            return redirect()->intended('admin');
        }
        return back()->with('error', 'Sorry, the information provided is incorrect!');
    }


}
