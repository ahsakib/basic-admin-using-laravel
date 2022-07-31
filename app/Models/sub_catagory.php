<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sub_catagory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id', 'subcategory_name', 'subcategory_slug',
    ];
    protected $guarded = [];

    //__join table__//
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
