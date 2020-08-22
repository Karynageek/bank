<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AccountRequest;
use App\Account;
use Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;

class AccountController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function show() {
        $account = Account::where('user_id', Auth::user()->id)->first();
        return View::make('account.view')
                        ->with('account', $account);
    }

    /*
     * DB::transaction(function () use ($request) {
      $user = User::where('id', Auth::user()->id)->lockForUpdate()->first();
      if ($user->balance < $request->money) {
      throw new \Exception('Insufficient funds');
      }
      //Снимаем деньги со счета пользователя
      $user->decrement('balance', $request->money);
      //Переводим деньги другому пользователю
      User::where('id', $request->receiver_id)->increment('balance', $request->money);
      //Добавляем в бд запись о транзакции
      $transaction = MoneyTransaction::create($request->all() + ['sender_id' => $user->id, 'type_id' => 2]);
      });
     */

    public function edit($id) {
        $account = Account::find($id);
        return View::make('account.update')
                        ->with('account', $account);
    }

    public function refill($id, AccountRequest $request) {
        $account = Account::find($id);
        $account->balance += $request->input('balance');
        $account->save();

        return Redirect::to('user/account/view');
    }

    public function withdraw($id, AccountRequest $request) {
        $account = Account::find($id);
        if ($account->balance >= $request->input('balance')) {
            $account->balance -= $request->input('balance');
            $account->save();
        }

        return Redirect::to('user/account/view');
    }

}
