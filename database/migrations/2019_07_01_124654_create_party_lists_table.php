<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePartyListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('party_lists', function (Blueprint $table) {
           $table->increments('id')->length(10);
           $table->string('party_name', 200);
           $table->string('party_email', 100);
           $table->string('party_contact_person', 200);
           $table->string('party_contact_number', 20);
           $table->string('party_code', 30);
           $table->string('party_address', 500);
           $table->string('party_trade_licence_no', 50);
           $table->string('party_vat_no', 50);
           $table->string('party_tin_no', 50);                                 
           $table->string('party_bank_name', 150);
           $table->string('party_bank_ac_no', 50);
           $table->string('party_cheque_routing_no', 50);           
           $table->tinyInteger('party_type')->length(4);
           $table->tinyInteger('published')->length(4);           
           $table->tinyInteger('deleted')->length(4);
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('party_lists');
    }
}
