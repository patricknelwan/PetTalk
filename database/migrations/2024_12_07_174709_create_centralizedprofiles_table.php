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
        Schema::create('centralizedprofiles', function (Blueprint $table) {
            $table->timestamps();
            $table->bigInteger('userid')->unsigned();
            $table->string('transport');
            $table->string('adoptiondescription');
            $table->bigInteger('adoptionid')->unsigned();
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('adoptionid')->references('id')->on('adopsis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('centralizedprofiles');
    }
};
