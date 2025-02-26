<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('commentsss', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained('postss')->onDelete('cascade');
 // Liên kết với bảng posts
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Liên kết với bảng users
            $table->text('content');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('commentsss');
    }
};
