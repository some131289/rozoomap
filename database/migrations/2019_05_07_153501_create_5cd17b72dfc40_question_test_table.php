<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create5cd17b72dfc40QuestionTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('question_test')) {
            Schema::create('question_test', function (Blueprint $table) {
                $table->integer('question_id')->unsigned()->nullable();
                $table->foreign('question_id', 'fk_p_301648_301649_test_q_5cd17b72dfd60')->references('id')->on('questions')->onDelete('cascade');
                $table->integer('test_id')->unsigned()->nullable();
                $table->foreign('test_id', 'fk_p_301649_301648_questi_5cd17b72dfdf7')->references('id')->on('tests')->onDelete('cascade');
                
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
        Schema::dropIfExists('question_test');
    }
}
