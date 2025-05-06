<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lich extends Model
{
    use HasFactory;
    protected $fillable = ['ngay',
    'trangthai',
    'intern_id'
];
}
