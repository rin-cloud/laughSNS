<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Laughsns extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        'entertainer' => 'required',
        'recommend' => 'required',
    );
    public function histories()
    {
      return $this->hasMany('App\History');

    }
}