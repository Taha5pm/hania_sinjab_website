<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    use HasFactory;
    protected $fillable = ['course_id', 'title', 'description', 'tags'];

    public function courses()
    {
        return $this->belongsTo(course::class);
    }
}
