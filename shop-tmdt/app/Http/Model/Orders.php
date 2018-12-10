<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table ='orders';
	protected $guarded =[];

	public function user()
    {
        return $this->belongsTo('App\Http\Model\User','c_id');
    }
    public function orders_detail()
	{
		return $this->hasMany('App\Http\Model\Orders_detail','o_id');
	}
}
