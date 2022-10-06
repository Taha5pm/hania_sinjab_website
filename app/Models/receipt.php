<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class receipt extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'course_id', 'amount_paid', 'amount_left', 'expire_date'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function courses()
    {
        return $this->belongsTo(course::class);
    }
}
