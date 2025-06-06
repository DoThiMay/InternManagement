<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Program extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['hoten',
    'ngay',
    'buoi',
    'vitri',
    'mon',
    'noidung',
    'mota',
    'sogiohoc'
];
}
