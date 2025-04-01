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
        Schema::create('copies', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('edition_id');
            $table->foreign('edition_id')->references('id')->on('editions');

            $table->decimal('wear_coefficient', 3, 2)->default(1.00); // Коэффициент износа, по умолчанию 1 (новый), число с 3 знаками и из них 2 после запятой

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('copies');
    }
};
