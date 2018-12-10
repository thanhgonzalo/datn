<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Orders_detail extends Model
{
    protected $table ='orders_detail';
	protected $guarded =[];

	 public function orders()
    {
        return $this->belongsTo('App\Http\Model\Orders','o_id');
    }

    public function products()
    {
        return $this->hasOne('App\Http\Model\Products','pro_id');
    }
}
