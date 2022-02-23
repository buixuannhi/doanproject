<?php 
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Category extends Model
{
    use softDeletes;
    protected $table = 'category';
    protected $dates =['deleted_at'];
    protected $fillable =['name','status'];


    public function product(){
        return $this->hasMany(product::class,'category_id','id'); 
    }


    public function scopeSearch($query)
    {
        if (request()->keywork){
            $key = request()->keywork;
            $query = $query->where('name','LIKE','%'.$key.'%');
        }
        return $query;      
    }


    public function scopeCatUpdate($query,$id)
    {
        $query = $query -> where('id',$id)->update(request()->only('name','status'));
        return $query;
    }

}