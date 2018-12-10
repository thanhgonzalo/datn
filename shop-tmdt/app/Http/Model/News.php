<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table ='news';
	protected $guarded =[];

	public function category()
	{
		return $this->belongsTo('App\Http\Model\Category','cat_id');
	}
}
