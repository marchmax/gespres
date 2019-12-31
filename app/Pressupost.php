<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pressupost extends Model
{
    //
    protected $table = 'pressupost';
    public $timestamps = false;

    protected $with = ['client'];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function items()
    {
        return $this->hasMany('App\PressupostItems');
    }
}
