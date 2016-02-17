<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    //
    /**
     * @var User
     */
    private $user;

    /**
     * PagesController constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        return redirect('admin/cafes');
        //return view('admin.index');
    }

    public function admins()
    {
        $admins = $this->user->orderby('name', 'asc')->get();
        return view('admin.admins', compact('admins'));
    }

}
