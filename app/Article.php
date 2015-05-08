<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model {

    protected $fillable = ['title','user_id'];


    public function user(){

        return $this->belongsTo('App\User');


    }
	//
    public function writable()
    {
        return $this->morphTo();
    }

}
