<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add5cd1793ee4c94RelationshipsToCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function(Blueprint $table) {
            if (!Schema::hasColumn('categories', 'discipline_id')) {
                $table->integer('discipline_id')->unsigned()->nullable();
                $table->foreign('discipline_id', '301650_5cd1793b3bd1b')->references('id')->on('disciplines')->onDelete('cascade');
                }
                if (!Schema::hasColumn('categories', 'created_by_id')) {
                $table->integer('created_by_id')->unsigned()->nullable();
                $table->foreign('created_by_id', '301650_5cd1793b57318')->references('id')->on('users')->onDelete('cascade');
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
        Schema::table('categories', function(Blueprint $table) {
            
        });
    }
}
