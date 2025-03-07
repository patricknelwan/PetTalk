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
        Schema::create('forumposts', function (Blueprint $table) {
            $table->bigIncrements('PostID');
            $table->bigInteger('ForumID')->unsigned();
            $table->longText('commentcontent');
            $table->string('username');
            $table->timestamps();
            $table->date('CreatedAt');
            $table->bigInteger('userid')->unsigned();
            $table->foreign('ForumID')->references('ForumID')->on('forums')->onDelete('cascade');
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('forumposts');
    }
};
