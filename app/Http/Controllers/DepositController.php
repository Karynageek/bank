<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Deposit;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\DepositRequest;

class DepositController extends Controller {

    public function show() {

        $deposits = Deposit::all();

        return View::make('deposit.view')
                        ->with('deposits', $deposits);
    }

    public function create() {
        return View::make('deposit.create');
    }

    public function store(DepositRequest $request) {

        $deposit = new Deposit;
        $deposit->status = $request->input('status');
        $deposit->finished_at = $request->input('finished_at');
        $deposit->sum = $request->input('sum');
        $deposit->interest_rate = $request->input('interest_rate');
        $deposit->save();

        return Redirect::to('deposit/view');
    }

}
