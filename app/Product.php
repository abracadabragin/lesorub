<?php

namespace Lesorub;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'type',
        'title',
        'description',
        'price',
        'old-price'
    ];

    public function productPhotos()
    {
        return $this->hasMany('ProductPhoto');
    }

}
