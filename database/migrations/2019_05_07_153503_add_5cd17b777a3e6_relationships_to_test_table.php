<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5cd17b777a3e6RelationshipsToTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tests', function(Blueprint $table) {
            if (!Schema::hasColumn('tests', 'category_id')) {
                $table->integer('category_id')->unsigned()->nullable();
                $table->foreign('category_id', '301649_5cd17b732c1a4')->references('id')->on('categories')->onDelete('cascade');
                }
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tests', function(Blueprint $table) {
            
        });
    }
}
