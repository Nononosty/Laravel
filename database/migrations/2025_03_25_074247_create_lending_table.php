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
        Schema::create('lendings', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('copy_id');
            $table->foreign('copy_id')->references('id')->on('copies');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->date('lending_date'); //дата выдачи
            $table->date('plan_return_date'); //планируемая дата возврата
            $table->date('fact_return_date')->nullable(); //фактическая дата возврата (может быть NULL)


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lendings');
    }
};
