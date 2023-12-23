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
        Schema::create('task', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('task_column_id')->unsigned();
            $table->BigInteger('created_user_id')->unsigned()->nullable();
            $table->BigInteger('joined_user_id')->unsigned()->nullable();
            $table->string('color_mark');
            $table->string('title');
            $table->string('label');
            $table->longText('description');
            $table->integer('priority');
            // $table->integer('checklist_id')->nullable();
            // $table->integer('comment_id')->nullable();
            $table->timestamps();

            $table->foreign('task_column_id')->references('id')->on('task_column')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('task');
    }
};
