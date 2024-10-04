<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'type',
        'uploaded_by',
        'travel_package_id', // Added this field
    ];

    /**
     * Get the media files associated with the media item.
     */
    public function mediaFiles()
    {
        return $this->hasMany(MediaFile::class);
    }

    /**
     * Get the user who uploaded the media.
     */
    public function uploader()
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    /**
     * Get the travel package associated with the media.
     */
    public function travelPackage()
    {
        return $this->belongsTo(TravelPackage::class);
    }
}