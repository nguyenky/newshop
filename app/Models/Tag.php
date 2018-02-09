<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public $table = 'tags';
    public $fillable = [
        'name',
        'new_price',
        'slug_name'
    ];
    protected $casts = [
        'name' => 'string',
        'slug_name' => 'string',
        'new_price' => 'integer',
    ];
    public $timestamps = false;
}
