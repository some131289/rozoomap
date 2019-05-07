<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1557231637DisciplinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('disciplines', function (Blueprint $table) {
            
if (!Schema::hasColumn('disciplines', 'image')) {
                $table->string('image')->nullable();
                }
if (!Schema::hasColumn('disciplines', 'active')) {
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
        Schema::table('disciplines', function (Blueprint $table) {
            $table->dropColumn('image');
            $table->dropColumn('active');
            
        });

    }
}
