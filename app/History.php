<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class History extends Model {

    protected $guarded = [];

    public function operation(): MorphTo {
        return $this->morphTo();
    }

}
