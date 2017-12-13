<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Проверка существования пользователя с указанными данными
     *
     * @param UserRequest $request
     * @return \Redirect
    */
    public function isUserExist(UserRequest $request) {
        $email = $request->user;
        $password = $request->password;
        $exist = '';

       if (!Auth::attempt(['email' => $email, 'password' => $password])) {
           $exist = 'default';
       }

        if ($exist !== 'default') {
            return redirect(route('main'));
        } else {
            return redirect(route('login'))->with(['exist' => $exist]);
        }
    }
}
