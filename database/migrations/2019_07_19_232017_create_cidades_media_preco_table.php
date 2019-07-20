<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCidadesMediaPrecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cidades_media_preco', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->double('media', 5, 3);
            $table->double('desvio_padrao', 5, 3);
            $table->double('menor_valor', 5, 3);
            $table->double('maior_valor', 5, 3);

            $table->integer('municipio_id');
            $table->foreign('municipio_id')
                ->references('id')
                ->on('municipios')
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
        Schema::dropIfExists('cidades_media_preco');
    }
}
