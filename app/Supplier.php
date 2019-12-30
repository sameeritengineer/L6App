<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    public function profile(){
    	return $this->hasManyThrough('App\UsersProfile','App\User','supplier_id','user_id','id','id');
    }
}
