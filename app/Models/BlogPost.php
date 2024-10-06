<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPost extends Model
{
    use HasFactory;

    // Fillable attributes for mass assignment
    protected $fillable = [
        'title',
        'content',
        'author_id',
        'category_id',
        'travel_package_id',
        'status',
        'publish_date',
    ];

    // Relationship to the User model (Author)
    public function author()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship to the Category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Relationship to the TravelPackage model
    public function travelPackage()
    {
        return $this->belongsTo(TravelPackage::class);
    }

// public function travel_package()
// {
//     return $this->belongsTo(TravelPackage::class);
// }
}
