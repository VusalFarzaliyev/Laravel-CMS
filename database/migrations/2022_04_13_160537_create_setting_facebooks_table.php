<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('setting_facebooks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('chat_id')->nullable();
            $table->boolean('chat_status')->nullable()->default(0);
            $table->bigInteger('client_id')->nullable();
            $table->string('client_secret')->nullable();
            $table->bigInteger('pixel_id')->nullable();
            $table->boolean('pixel_status')->nullable()->default(0);
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
        Schema::dropIfExists('setting_facebooks');
    }
};
