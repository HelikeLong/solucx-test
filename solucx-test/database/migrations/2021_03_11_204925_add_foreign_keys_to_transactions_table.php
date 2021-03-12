<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->foreign('client_id', 'transactions_FK')->references('id')->on('clients')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('collaborator_id', 'transactions_FK_1')->references('id')->on('collaborators')->onUpdate('RESTRICT')->onDelete('CASCADE');
            $table->foreign('store_id', 'transactions_FK_2')->references('id')->on('stores')->onUpdate('RESTRICT')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->dropForeign('transactions_FK');
            $table->dropForeign('transactions_FK_1');
            $table->dropForeign('transactions_FK_2');
        });
    }
}
