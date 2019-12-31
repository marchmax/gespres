<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albara extends Model
{
    //
    protected $table = 'albara';
    public $timestamps = false;

    protected $with = ['client'];
    protected $fillable = ['numalbara','total','dataalbara','client_id','estat','any','iva','observacions','subtotal'];

    public function client()
    {
        return $this->belongsTo('App\Client');
    }

    public function items()
    {
        return $this->hasMany('App\AlbaraItems');
    }

}
