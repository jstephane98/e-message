<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('send');
            $table->unsignedBigInteger('receive')->nullable();
            $table->unsignedBigInteger('group_id')->nullable();
            $table->string('message');
            $table->string('type');
            $table->integer('transfert')->default(0);
            $table->timestamp('send_at');
            $table->timestamp('receive_at')->nullable();
            $table->timestamp('read_at')->nullable();

            $table->foreign('send')->references('id')->on('users');
            $table->foreign('receive')->references('id')->on('users');
            $table->foreign('group_id')->references('id')->on('groups');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
