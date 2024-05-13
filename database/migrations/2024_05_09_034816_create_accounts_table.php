<?php

use App\Models\Role;
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
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();
            $table->string('email');
            $table->string('password');
            $table->string('name');
            $table->string('linkfb')->nullable();
            $table->string('numberphone');
            $table->text('bank');
            $table->string('describe');
            $table->string('cmnd');
            $table->string('games');
            $table->integer('money')->default(0); 
            $table->integer('numcomments')->default(3);
            $table->string('active')->nullable();
            $table->foreignIdFor(Role::class)->nullable()->constrained(); 
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
        Schema::dropIfExists('accounts');
    }
};
