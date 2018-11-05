<?php

namespace App;


use App\Category;
use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	use SoftDeletes;
    
    protected $guarded = [];
    protected $dates = ['deleted_at'];

    public function categories(){
        return $this->belongsToMany('App\Category','category_product');
    }
}
