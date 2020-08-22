<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class History extends Model
{
    public function subject(): MorphTo
    {
        return $this->morphTo();
    }
}
