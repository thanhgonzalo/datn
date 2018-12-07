<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders_detail extends Model
{
    protected $table ='orders_detail';
	protected $guarded =[];

	 public function orders()
    {
        return $this->belongsTo('App\orders','o_id');
    }

    public function products()
    {
        return $this->hasOne('App\Products','pro_id');
    }
}
