<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1557232493TestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tests', function (Blueprint $table) {
            
if (!Schema::hasColumn('tests', 'description')) {
                $table->text('description')->nullable();
                }
if (!Schema::hasColumn('tests', 'test_image')) {
                $table->string('test_image')->nullable();
                }
if (!Schema::hasColumn('tests', 'active')) {
                $table->tinyInteger('active')->nullable()->default('1');
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
        Schema::table('tests', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('test_image');
            $table->dropColumn('active');
            
        });

    }
}
