<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'subcategory_id', 'user_id', 'title', 'slug', 'post_date', 'image', 'description', 'tags', 'status',
    ];

    //__category join__//
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id'); //category_id
    }
    //__subcategory join__//
    public function subcategory()
    {
        return $this->belongsTo(sub_catagory::class, 'subcategory_id'); //subcategory_id
    }
    //__user join__//
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); //__user_id
    }
}
