<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videotempo extends Model
{
    use HasFactory;
    protected $fillable = ['filename', 'foldername'];
}
