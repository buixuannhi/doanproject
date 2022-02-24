<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $table = 'product_image';
    protected $dates = ['deleted_at'];
    protected $fillable = ['name', 'status', 'image', 'product_id'];

    public function prod()
    {
        return $this->hasOne(ProductImage::class, 'id', 'product_id');
    }
}
