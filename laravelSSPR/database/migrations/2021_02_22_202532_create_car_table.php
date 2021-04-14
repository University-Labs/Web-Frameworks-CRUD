<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('car'))
        {
            Schema::create('car', function (Blueprint $table) {
                $table->id('PK_Car');
                $table->year('yearIssue')->nullable();
                $table->decimal('price', $precision = 15, $scale = 2 );
                $table->string('imagePath', 255)->nullable();
                $table->text('description')->nullable();

                $table->unsignedBigInteger('PK_BaseAvto');
                $table->foreign('PK_BaseAvto')->references('PK_BaseAvto')->on('baseavto')->onDelete('restrict');

                $table->unsignedBigInteger('PK_Superstructure');
                $table->foreign('PK_Superstructure')->references('PK_Superstructure')->on('superstructure')->onDelete('restrict');

                $table->unsignedBigInteger('PK_Category');
                $table->foreign('PK_Category')->references('PK_Category')->on('avtocategory')->onDelete('restrict')->nullable();
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
        Schema::dropIfExists('car');
    }
}
