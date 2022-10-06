<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class log extends Model
{
    use HasFactory;
    protected $fillable = ['superadmin_id', 'action'];

    public function users()
    {
        return $this->belongsTo(user::class, 'superadmin_id');
    }
}
