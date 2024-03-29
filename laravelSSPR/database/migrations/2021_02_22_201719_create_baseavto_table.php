<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseavtoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('baseavto'))
        {
            Schema::create('baseavto', function (Blueprint $table) {
                $table->id('PK_BaseAvto');
                $table->string('modelName', 200);

                $table->unsignedBigInteger('PK_AvtoFirm');
                $table->foreign('PK_AvtoFirm')->references('PK_AvtoFirm')->on('avtofirm')->onDelete('restrict');

            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('baseavto');
    }
}
