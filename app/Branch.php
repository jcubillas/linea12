<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function stop()
    {
        return $this->hasMany('App\Stop');
    }
}
