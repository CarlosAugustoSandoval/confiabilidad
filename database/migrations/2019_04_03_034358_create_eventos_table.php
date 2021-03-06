<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->dateTime('fecha_registro');
            $table->dateTime('fecha_inicio');
            $table->dateTime('fecha_fin')->nullable();
            $table->dateTime('fecha_inicio_reparacion')->nullable();
            $table->dateTime('fecha_fin_reparacion')->nullable();
            $table->integer('downtime');
            $table->enum('estado',['Registrado','Cerrado','Anulado']);
            $table->tinyInteger('contractual')->unsigned();
            $table->string('archivo_soporte')->nullable();
            $table->bigInteger('tipo_evento_id')->unsigned();
            $table->bigInteger('tipo_mantenimiento_id')->unsigned();
            $table->bigInteger('equipo_id')->unsigned();
            $table->bigInteger('evento_padre_id')->nullable()->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('tipo_evento_id')->references('id')->on('tipo_eventos')->onDelete('restrict');
            $table->foreign('tipo_mantenimiento_id')->references('id')->on('tipo_mantenimientos')->onDelete('restrict');
            $table->foreign('equipo_id')->references('id')->on('equipos')->onDelete('restrict');
            $table->foreign('evento_padre_id')->references('id')->on('eventos')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
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
        Schema::dropIfExists('eventos');
    }
}
