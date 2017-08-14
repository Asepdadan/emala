<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    //
    protected $table = 'rules';

    public function user(){
    	return $this->hasMany(User::class);
    }
}
