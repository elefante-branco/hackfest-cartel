<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDenunciasAnexosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('denuncias_anexos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->tinyInteger('tipo_anexo');
            $table->string('caminho_arquivo');

            $table->integer('denuncia_id');
            $table->foreign('denuncia_id')
                ->references('id')
                ->on('entidades_denuncias')
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
        Schema::dropIfExists('denuncias_anexos');
    }
}
