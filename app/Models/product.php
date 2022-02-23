<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $table = 'product';
    protected $fillable =['name','image','price','salse_price','description','status','category_id','created_at','updated_at'];

    public function cat(){
        return $this->hasOne(Category::class,'id','category_id');
    }
    public function images(){
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
}
