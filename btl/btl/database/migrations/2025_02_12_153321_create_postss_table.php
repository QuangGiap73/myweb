<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('postss', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('img')->nullable(); // Ảnh bài viết (lưu tên file)
            $table->text('content');
            $table->boolean('is_published')->default(false); // Trạng thái đăng bài
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('postss');
    }
};
