<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class course extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'field', 'price'];

    public function videos()
    {
        return $this->hasMany(video::class);
    }
    public function receipts()
    {
        return $this->hasMany(receipt::class);
    }
}
