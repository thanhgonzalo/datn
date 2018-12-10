<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table ='category';
	protected $guarded =[];
	
	public function products()
	{
		return $this->hasMany('App\Http\Model\Products','cat_id');
	}
	public function news()
	{
		return $this->hasMany('App\Http\Model\News','cat_id');
	}
}
