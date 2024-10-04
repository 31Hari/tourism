<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'media_id',
        'file_name',
        'file_path',
    ];

    /**
     * Get the media item that owns the media file.
     */
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
}