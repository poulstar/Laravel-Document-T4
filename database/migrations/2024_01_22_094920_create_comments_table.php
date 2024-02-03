<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('post_id');
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->boolean('child')->default(false);
            $table->string('title',100);
            $table->text('text');
            $table->timestamps();

            $table->foreign('user_id')
            ->on('users')
            ->references('id')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->foreign('post_id')
            ->on('posts')
            ->references('id')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();

            $table->foreign('parent_id')
            ->on('comments')
            ->references('id')
            ->cascadeOnDelete()
            ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
