<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lists extends Model
{
	
	protected $table = "lists";

	protected $fillable = ['name','description', 'user_id'];

	public function user(){
 
        return $this->belongsTo('App\User');
 
    }
}
