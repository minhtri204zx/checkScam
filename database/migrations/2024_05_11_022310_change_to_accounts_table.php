<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accounts', function (Blueprint $table) {
            $table->dropColumn('password');
            $table->dropColumn('bank');
            $table->dropColumn('describe');
            $table->dropColumn('cmnd');
            $table->dropColumn('games');
            $table->dropColumn('money');
            $table->dropColumn('active');
            $table->dropColumn('money');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accounts', function (Blueprint $table) {
            //
        });
    }
};
