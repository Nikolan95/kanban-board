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
        Schema::create('check_list', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->BigInteger('task_id')->unsigned();
            $table->string('title');
            $table->boolean('completed')->default(0);
            $table->timestamps();

            $table->foreign('task_id')->references('id')->on('task')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check_list');
    }
};
