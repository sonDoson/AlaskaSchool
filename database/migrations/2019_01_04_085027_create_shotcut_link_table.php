<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShotcutLinkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shotcut_link', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name_vn')->nullable();
            $table->string('name_en')->nullable();
            $table->string('url')->nullable();
            $table->boolean('flag')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shotcut_link');
    }
}
