<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRelicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relics', function (Blueprint $table) {
            $table->id();
            $table->text('relicsName');
            $table->text('organizationID');
            $table->string('relicsDescribe', 10383);
            $table->text('relicsFare');
            $table->text('relicsAddress');
            $table->timestamps();
//            $table->foreign('organizationID')->references('id')->on('organizations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('relics');
    }
}
