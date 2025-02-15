<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    // ✅ Khai báo thuộc tính có thể gán hàng loạt
    protected $fillable = ['name'];
}

