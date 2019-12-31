<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //
    protected $table = 'client';
    public $timestamps = false;

    public function albarans()
    {
        return $this->hasMany('App\Albara');
    }

    public function pressupostos()
    {
        return $this->hasMany('App\Pressupost');
    }

    public function factures()
    {
        return $this->hasMany('App\Factura');
    }
}
