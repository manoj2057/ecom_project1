<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    use HasFactory;
    
    public function category(){
        return $this->belongsTo(Category::class, 'category_id');
    }
  
    public static function getProduct(){
        $records = DB::table('products')->select('id', 'product_name', 'slug','price')->get()->toArray();
        return $records;
    }

}
