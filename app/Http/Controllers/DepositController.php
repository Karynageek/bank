<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Deposit;
use App\Account;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\DepositRequest;
use Auth;

class DepositController extends Controller {

    public function __construct() {
        $this->middleware('auth');
    }

    public function show() {
        $deposits = Deposit::where('user_id', Auth::user()->id)
                        ->where('status', 2)->paginate(5);
        return View::make('deposit.view')
                        ->with('deposits', $deposits);
    }

    public function create() {
        return View::make('deposit.create');
    }

    public function store(DepositRequest $request) {
        $deposit = new Deposit;
        $account = Account::where('user_id', Auth::user()->id)->first();
        if ($account->balance >= $request->input('sum')) {
            $deposit->status = $request->input('status');
            $deposit->finished_at = $request->input('finished_at');
            $deposit->sum = $request->input('sum');
            $deposit->interest_rate = $request->input('interest_rate');
            $deposit->user_id = Auth::user()->id;

            $account->balance -= $request->input('sum');

            $deposit = $account->deposits()->save($deposit);
            $account->save();
        }
        return Redirect::to('user/deposit/view');
    }

}
