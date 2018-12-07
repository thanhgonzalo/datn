<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table ='orders';
	protected $guarded =[];

	public function user()
    {
        return $this->belongsTo('App\User','c_id');
    }
    public function orders_detail()
	{
		return $this->hasMany('App\orders_detail','o_id');
	}
}
