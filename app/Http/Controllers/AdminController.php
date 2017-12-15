<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Middleware\CheckAuth;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Redirect;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(CheckAuth::class);
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        return view('admin.main');
    }

    /**
     * Выход из системы
     *
     * @return \Redirect
     */
    public function logout() {
        Auth::logout();
        return redirect(route('main'));
    }
}

