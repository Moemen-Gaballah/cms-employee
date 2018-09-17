<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    public function sallary() {
        return $this->hasMany('App\Sallary');
    }

    public function absence() {
        return $this->hasMany('App\Absence');
    }
}
