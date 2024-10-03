<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'duration',
        'plan_id',
        'location_id',
        'includes_hotel',
    ];

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}