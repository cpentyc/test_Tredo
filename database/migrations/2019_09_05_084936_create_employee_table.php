<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment("Имя");
            $table->string('surname')->comment("Фамилия");
            $table->string('patronymic')->comment("Отчество");
            $table->boolean('gender')->default(1)->comment("1 - муж, 0 - жен");
            $table->integer('wage')->comment("Заработная плата");
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
        Schema::dropIfExists('employee');
    }
}
