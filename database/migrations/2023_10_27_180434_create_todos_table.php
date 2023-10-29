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
        Schema::create('todos', function (Blueprint $table) {
            $table->id();
            $table->string('description');
            $table->boolean('is_done');
            $table->unsignedBigInteger('todo_list_id');
            $table->dateTime('created_at');
            $table->dateTime('updated_at');

            $table->foreign('todo_list_id')->references('id')->on('todo_lists')->onDelete('Cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todos');
    }
};
