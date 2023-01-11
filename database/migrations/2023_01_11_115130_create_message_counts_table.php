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
        Schema::create('message_counts', function (Blueprint $table){
            $table->id();
            $table->integer('available_sms')->nullable();
            $table->integer('available_emails')->nullable();
            $table->integer('sent_sms')->nullable();
            $table->integer('sent_emails')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('message_counts');
    }
};
