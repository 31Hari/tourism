<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TravelPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'category_id',
        'plan_id',
        'location_id',
        'hotel_id',
        'status',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    protected $attributes = [
        'status' => 'active',
    ];

    // Relationships

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }

    // Accessor for duration
    public function getDurationAttribute()
    {
        return $this->start_date->diffInDays($this->end_date);
    }
}
