<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Deposit;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\DepositRequest;

class AdminDepositController extends Controller {

    public function __construct() {
        $this->middleware('isAdmin');
    }

    public function show() {

        $deposits = Deposit::paginate(5);

        return View::make('admin_deposit.view')
                        ->with('deposits', $deposits);
    }

    public function edit($id) {
        $deposit = Deposit::find($id);
        return View::make('admin_deposit.update')
                        ->with('deposit', $deposit);
    }

    public function update($id, DepositRequest $request) {
        $deposit = Deposit::find($id);
        $deposit->status = $request->input('status');
        $deposit->created_at = $request->input('created_at');
        $deposit->finished_at = $request->input('finished_at');
        $deposit->sum = $request->input('sum');
        $deposit->interest_rate = $request->input('interest_rate');
        $deposit->save();

        return Redirect::to('admin/deposit/view');
    }

    public function destroy($id) {
        $deposit = Deposit::find($id);
        if ($deposit->delete()) {
            return Redirect::to('admin/deposit/view');
        }
    }

    public function runAccruals() {
        $deposits = Deposit::where('status', 2)->get();
        $profit = 0;
        foreach ($deposits as $deposit) {
            $interest_rate = Deposit::where('id', $deposit->id)->first();
            $sum = Deposit::where('id', $deposit->id)->first();
            $profit = $sum->sum * $interest_rate->interest_rate / 100;
            Deposit::where('id', $deposit->id)->update(['profit' => $profit]);
        }
    }

}
