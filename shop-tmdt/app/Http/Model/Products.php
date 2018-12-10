<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table ='products';
    protected $guarded =[];

    public function category()
    {
        return $this->belongsTo('App\Http\Model\Category','cat_id');
    }
    public function pro_details()
    {
        return $this->hasOne('App\Http\Model\Pro_details','pro_id');
    }
    public function detail_img()
    {
        return $this->hasMany('App\Http\Model\Detail_img','pro_id');
    }
    public function orders_detail()
    {
        return $this->hasOne('App\Http\Model\Orders_detail','pro_id');
    }
}
