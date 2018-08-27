<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubmodulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submodules', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 60);
            $table->unsignedInteger('module_id');
            $table->unsignedInteger('submodule_action_id');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('module_id')->references('id')->on('modules');
            $table->foreign('submodule_action_id')->references('id')->on('submodules_actions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submodules');
    }
}
