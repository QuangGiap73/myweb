<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'postss'; // Chỉ định tên bảng
    protected $fillable = ['name', 'img', 'content', 'is_published']; // Các trường có thể điền
    // Thiết lập quan hệ với bảng Commentsss
    public function commentsss()
{
    return $this->hasMany(Commentsss::class, 'post_id');
}

    
    
}

