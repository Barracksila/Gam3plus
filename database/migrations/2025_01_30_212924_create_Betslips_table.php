<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBetslipsTable extends Migration
{
    public function up()
    {
        Schema::create('betslips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 10, 2); // The amount of the bet
            $table->json('bets'); // Store bet details in JSON format
            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('betslips');
    }
}
