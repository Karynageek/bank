<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\UserRequest;

class AdminUserController extends Controller {

    public function show() {
        $users = User::all();

        return View::make('admin_user.view')
                        ->with('users', $users);
    }

    public function create() {

        return View::make('admin_user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(UserRequest $request) {

        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();

        return Redirect::to('admin/user/view');
    }

    public function edit($id) {
        $user = User::find($id);

        return View::make('admin_user.update')
                        ->with('user', $user);
    }

    public function update($id, UserRequest $request) {
        $user = User::find($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return Redirect::to('admin/user/view');
    }

    public function destroy($id) {
        $user = User::find($id);
        if ($user->delete()) {
            return Redirect::to('admin/user/view');
        }
    }

}
