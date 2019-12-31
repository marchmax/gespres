<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AlbaraItems extends Model
{
    //
    protected $table = 'detallalbara';
    public $timestamps = false;

    protected $with = ['albara'];
    protected $fillable = ['albara_id','producte','quantitat','preu','total'];

    public function albara()
    {
        return $this->belongsTo('App\Albara');
    }
}
