<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table = 'postss'; // Đảm bảo đúng tên bảng
    protected $fillable = ['name', 'img', 'content', 'is_published', 'category_id']; // Thêm 'category_id'

    public function commentsss()
    {
        return $this->hasMany(Commentsss::class, 'post_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}

