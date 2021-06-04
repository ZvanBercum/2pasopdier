<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('owner_id')->constrained()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('sitter_id')->constrained()->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('pet_id')->constrained()->references('id')->on('pets')->onDelete('cascade');
            $table->boolean('accepted');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
