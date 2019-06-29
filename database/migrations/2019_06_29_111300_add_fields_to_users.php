<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstname', 100);
            $table->string('lastname', 100);
            $table->string('username', 100);
            $table->integer('g_id')->length(5);
            $table->tinyInteger('daily_transaction_report')->length(4);
            $table->tinyInteger('published')->length(4);
            $table->tinyInteger('deleted')->length(4);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('firstname');
            $table->dropColumn('lastname');
            $table->dropColumn('username');
            $table->dropColumn('g_id');
            $table->dropColumn('daily_transaction_report');
            $table->dropColumn('published');
            $table->dropColumn('deleted');            
        });
    }
}
