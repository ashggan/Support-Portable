<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    //
    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function client()
    {
    	return $this->belongsTo('App\Client');
    }

    function scopeSearch($query , $key){
    	return $query->where('name','like','%',$key,'%')->orWhere('comapny','like','%'.$key.'%') ;
    }
}
