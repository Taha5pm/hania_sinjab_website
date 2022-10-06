<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    use HasFactory;
    protected $fillable = ['subscriber_id', 'video_id'];

    public function users()
    {
        return $this->belongsTo(User::class, 'subscriber_id');
    }
    public function videos()
    {
        return $this->belongsTo(video::class, 'video_id');
    }
}
