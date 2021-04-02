<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    
    protected $guarded = array('id');

    public static $rules = array(
        'laughsns_id' => 'required',
        'edited_at' => 'required',
    );
}
