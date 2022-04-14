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
        Schema::create('setting_googles', function (Blueprint $table) {
            $table->id();
            $table->string('tracking_id')->nullable();
            $table->boolean('analytics')->nullable()->default(0);
            $table->bigInteger('client_id')->nullable();
            $table->string('client_secret')->nullable();
            $table->string('firebase_key')->nullable();
            $table->boolean('firebase')->nullable()->default(0);
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
        Schema::dropIfExists('setting_googles');
    }
};
