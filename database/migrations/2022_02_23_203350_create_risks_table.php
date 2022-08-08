<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('risks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('card_id')->constrained();
            $table->foreignId('process_id')->constrained();
            $table->string('name');
            $table->integer('frecuency');
            $table->integer('impact');
            $table->integer('owner')->default(\App\Models\Risk::OWNERS[0]['id']);
            $table->integer('cost')->default(\App\Models\Risk::COSTS[0]['id']);
            $table->integer('prevention')->default(\App\Models\Risk::PREVENTIONS[0]['id']);
            $table->integer('action')->default(\App\Models\Risk::ACTION[0]['id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('risks');
    }
};
