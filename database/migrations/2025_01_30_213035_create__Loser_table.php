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
        Schema::create('_loser', function (Blueprint $table) {
            $table->id('Loser_id');//Get the Loser id
            $table->timestamps();
            $table->string('Loser_Name');//Factory for the Loser name
$table->string('Avatar');//Avatar 
$table->string('Country');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_loser');
    }
};
