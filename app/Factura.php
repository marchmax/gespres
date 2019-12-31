<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    //
    protected $table = 'factura';
    public $timestamps = false;

    protected $with = ['client'];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function items()
    {
        return $this->hasMany('App\FacturaItems');
    }
}
