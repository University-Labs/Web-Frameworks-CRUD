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
                $table->foreignId('PK_BaseAvto')->constrained('baseavto');
                $table->foreignId('PK_Superstructure')->constrained('superstructure');
                $table->foreignId('PK_Category')->constrained('avtocategory')->nullable();
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
