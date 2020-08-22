<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Description of Account
 *
 * @author Karina
 */
class Account extends Eloquent {

    use HistoryTransactions;

    public function deposits() {
        return $this->hasMany('App\Deposit');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

}
