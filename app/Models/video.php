<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;
    protected $fillable = ['course_id', 'description', 'tags', 'views'];

    public function courses()
    {
        return $this->belongsTo(course::class);
    }
}
