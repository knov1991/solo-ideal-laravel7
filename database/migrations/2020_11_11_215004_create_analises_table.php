<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnalisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('analises', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('talhao_id');
            $table->integer('numero')->default(1);
            $table->date('data')->nullable()->default(NULL);
            $table->decimal('ph', 4, 2)->default('0');
            $table->decimal('nitrogenio', 4, 2)->default('0');
            $table->decimal('fosforo', 4, 2)->default('0');
            $table->decimal('potassio', 4, 2)->default('0');
            $table->decimal('calcio', 4, 2)->default('0');
            $table->decimal('magnesio', 4, 2)->default('0');
            $table->decimal('enxofre', 4, 2)->default('0');
            $table->decimal('boro', 4, 2)->default('0');
            $table->decimal('cobre', 4, 2)->default('0');
            $table->decimal('cloro', 4, 2)->default('0');
            $table->decimal('ferro', 4, 2)->default('0');
            $table->decimal('molibdenio', 4, 2)->default('0');
            $table->decimal('zinco', 4, 2)->default('0');
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
        Schema::dropIfExists('analises');
    }
}
