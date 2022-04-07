<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    use HasFactory;
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $fillable = [
        'category_name',
        'slug',
        'parent_id',
        'status'
    ];
    public function subCategory(){
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public static function getCategory(){
        $records = DB::table('categories')->select('id', 'category_name', 'slug')->get()->toArray();
        return $records;
    }

}
