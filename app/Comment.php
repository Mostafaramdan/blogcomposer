<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function posts(){
		return $this->belongsTo('App\post');
						  
} public function user(){
		return $this->belongsTo('App\User');
						  }
}
