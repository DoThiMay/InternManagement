<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tiendo extends Model
{
    use HasFactory;
    protected $fillable = ['intern_id',
    'program_id',
    'tiendo'
];
}
