<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('nip')->unique();
            $table->string('name');
            $table->string('image')->default('blank.jpg');
            $table->foreignId('jabatan_id')
                ->nullable()
                ->constrained('jabatans')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('golongan_id')
                ->nullable()
                ->constrained('golongans')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('role')->default('user');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
