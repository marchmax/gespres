<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PressupostItems extends Model
{
    //
    protected $table = 'detallpress';
    public $timestamps = false;

    public function pressupost()
    {
        return $this->belongsTo('App\Pressupost');
    }
}
