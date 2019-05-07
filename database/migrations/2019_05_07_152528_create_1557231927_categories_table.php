<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1557231927CategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->increments('id');
                $table->string('title')->nullable();
                $table->integer('class')->nullable()->unsigned();
                $table->text('description')->nullable();
                $table->string('category_image')->nullable();
                $table->tinyInteger('active')->nullable()->default('1');
                
                $table->timestamps();
                $table->softDeletes();

                $table->index(['deleted_at']);
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
        Schema::dropIfExists('categories');
    }
}
