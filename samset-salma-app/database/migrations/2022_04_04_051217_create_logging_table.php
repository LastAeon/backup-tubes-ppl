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
    public function up() {
        Schema::create('change_logs', function (Blueprint $table) {
          $table->id();
        //   $table->unsignedBigInteger('user_id')->nullable();
          $table->string('Global_Id');
          $table->string('action',7);
          $table->text('message')->nullable();
          $table->json('models');
          $table->timestamps();
      
        //   $table->foreign('user_id')->references('id')->on('users');
        });
      }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('change_logs');
    }
};
