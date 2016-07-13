<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{

	protected $table = "tasks";

	protected $fillable = ['completed','description', 'list_id'];

	public function lists(){
 
        return $this->belongsTo('App\Lists');
 
    }
}
