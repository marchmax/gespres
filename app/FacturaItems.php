<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacturaItems extends Model
{
    //
    protected $table = 'detallfactura';
    public $timestamps = false;

    public function factura()
    {
        return $this->belongsTo('App\Factura');
    }
}
