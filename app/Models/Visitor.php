<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    protected $fillable = ['subscriber_id', 'ip_address'];


    public function users()
    {
        return $this->belongsTo(User::class, 'subscriber_id');
    }
}
