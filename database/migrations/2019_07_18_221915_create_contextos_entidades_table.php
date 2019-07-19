<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContextosEntidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contextos_entidades', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->integer('contexto_id');
            $table->foreign('contexto_id')
                ->references('id')
                ->on('contextos')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->integer('entidade_id');
            $table->foreign('entidade_id')
                ->references('id')
                ->on('entidades')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contextos_entidades');
    }
}
