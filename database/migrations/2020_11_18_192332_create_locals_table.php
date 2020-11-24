<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locals', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id');
            $table->string('nome', 100)->nullable()->default(NULL);
            $table->timestamps();
        });
    }

    // Chave estrangeira de desembolsos
    //$table->unsignedInteger('projeto_desembolso_id');
    //$table->foreign('projeto_desembolso_id')->references('id')->on('projeto_desembolsos');
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locals');
    }
}
