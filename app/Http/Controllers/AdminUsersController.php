<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckAuth;
use App\Http\Middleware\IsUserExist;
use App\Http\Requests\UserCreateRequest;
use App\User;
use Hash;
use Response;

class AdminUsersController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(CheckAuth::class);

        $this->middleware(CheckAdmin::class);

        $this->middleware(IsUserExist::class)->only(['delete']);
    }

    /**
     * Вывести страницу управления пользователями
     *
     * @return Response
     */
    public function editUsers()
    {
        $users = User::orderBy('created_at')->get();

        return view('admin.users.all', ['users' => $users]);
    }

    /**
     * Создать пользователя
     *
     * @param UserCreateRequest $request
     * @return \Redirect
    */
    public function create(UserCreateRequest $request)
    {
        if (!blank(User::where(['name' => $request->name])->get())) {
            return redirect(route('admin.users.edit'))
                ->with(['error' => 'Пользователь с таким именем уже существует']);
        } elseif (!blank(User::where(['email' => $request->email])->get())) {
            return redirect(route('admin.users.edit'))
                ->with(['error' => 'Пользователь с таким email уже существует']);
        } elseif ($request->password !== $request->re_password) {
            return redirect(route('admin.users.edit'))
                ->with(['error' => 'Пароли не совпадают']);
        } else {
            $user = new User([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'is_admin' => false
            ]);
            $user->save();

            return redirect(route('admin.users.edit'))
                ->with(['success' => 'Пользователь успешно создан']);
        }
    }

    /**
     * Удалить пользователя
     *
     * @param int $id Идентификатор пользователя
     * @return \Redirect
     * @throws \Exception
     */
    public function delete($id)
    {
        User::find($id)->delete();

        return redirect(route('admin.users.edit'))
            ->with(['status' => 'Пользователь был успешно удален']);
    }
}
