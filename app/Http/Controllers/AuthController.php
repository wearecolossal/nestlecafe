<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    /**
     * @var User
     */
    private $user;


    /**
     * AuthController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getLogin()
    {
        return view('auth.login');
    }


}
