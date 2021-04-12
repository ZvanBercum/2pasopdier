<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->foreignId('type_id')->references('id')->on('pet_types')->onDelete('cascade');
            $table->foreignId('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->boolean('active');
            $table->text('profile');
            $table->integer('price');
            $table->string('rate');
            $table->string('pref_picture')->nullable();
            $table->string('location')->nullable();
            $table->string('start_time')->nullable();
            $table->string('end_time')->nullable();
            $table->foreignId('sitter_id')->nullable()->constrained()->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('pets');
        Schema::enableForeignKeyConstraints();
    }
}
