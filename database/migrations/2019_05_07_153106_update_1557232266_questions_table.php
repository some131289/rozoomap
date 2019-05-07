<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1557232266QuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            if(Schema::hasColumn('questions', 'title')) {
                $table->dropColumn('title');
            }
            
        });
Schema::table('questions', function (Blueprint $table) {
            
if (!Schema::hasColumn('questions', 'question')) {
                $table->text('question');
                }
if (!Schema::hasColumn('questions', 'question_image')) {
                $table->string('question_image')->nullable();
                }
if (!Schema::hasColumn('questions', 'score')) {
                $table->integer('score')->nullable();
                }
if (!Schema::hasColumn('questions', 'answer1')) {
                $table->text('answer1')->nullable();
                }
if (!Schema::hasColumn('questions', 'correct1')) {
                $table->tinyInteger('correct1')->nullable()->default('0');
                }
if (!Schema::hasColumn('questions', 'answer2')) {
                $table->text('answer2')->nullable();
                }
if (!Schema::hasColumn('questions', 'correct2')) {
                $table->tinyInteger('correct2')->nullable()->default('0');
                }
if (!Schema::hasColumn('questions', 'answer3')) {
                $table->text('answer3')->nullable();
                }
if (!Schema::hasColumn('questions', 'correct3')) {
                $table->tinyInteger('correct3')->nullable()->default('0');
                }
if (!Schema::hasColumn('questions', 'answer4')) {
                $table->text('answer4')->nullable();
                }
if (!Schema::hasColumn('questions', 'correct4')) {
                $table->tinyInteger('correct4')->nullable()->default('0');
                }
if (!Schema::hasColumn('questions', 'answer5')) {
                $table->text('answer5')->nullable();
                }
if (!Schema::hasColumn('questions', 'correct5')) {
                $table->tinyInteger('correct5')->nullable()->default('0');
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
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn('question');
            $table->dropColumn('question_image');
            $table->dropColumn('score');
            $table->dropColumn('answer1');
            $table->dropColumn('correct1');
            $table->dropColumn('answer2');
            $table->dropColumn('correct2');
            $table->dropColumn('answer3');
            $table->dropColumn('correct3');
            $table->dropColumn('answer4');
            $table->dropColumn('correct4');
            $table->dropColumn('answer5');
            $table->dropColumn('correct5');
            
        });
Schema::table('questions', function (Blueprint $table) {
                        $table->string('title')->nullable();
                
        });

    }
}
