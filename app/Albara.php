<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albara extends Model
{
    //
    protected $table = 'albara';
    public $timestamps = false;

    public function client()
    {
        return $this->hasOne('App\Client');
    }

    public function albaraitems()
    {
        return $this->hasMany('App\AlbaraItems');
    }

}
