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
        Schema::create('_visitor', function (Blueprint $table) {
            $table->id('Visitor_id');
            $table->timestamps();
            $table->string('Visitor_Name');
            $table->string('Country');
            $table->string('Avatar');
            $table->string('name', 100);


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_visitor');
    }
};
