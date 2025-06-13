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
        Schema::create('_admin', function (Blueprint $table) {
            $table->id('Admin_id');
            $table->timestamps();
            $table->string('Admin_Name');
           $table->integer('PhoneNumber');
            $table->string('Country');
            $table->string('Avatar');
            $table->string('email', 150);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_admin');
    }
};
