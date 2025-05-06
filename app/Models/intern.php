<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
class intern extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = ['hoten',
            'tgbatdau',
            'tgketthuc',
            'vitri',
            'truong',
            'gpa',
            'ngaysinh',
            'sdt',
            'email',
            'password'
        ];
}
