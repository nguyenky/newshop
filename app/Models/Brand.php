<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $table = 'brands';
    public $fillable = [
        'name',
    ];
    protected $casts = [
        'name' => 'string',
    ];
    public $timestamps = false;
    public function has_products(){
        return $this->hasMany(\App\Models\Product::class,'brand_id');
    }
    public function count_brands(){
        $brands = $this->all();
        foreach ($brands as $key => $value) {
            $value['count'] = $value->has_products()->count();
        }
        return $brands->toArray();
    }
}
