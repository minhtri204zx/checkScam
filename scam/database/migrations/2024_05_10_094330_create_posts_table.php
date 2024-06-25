<?php

use App\Models\Account;
use App\Models\Category;
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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();//
            $table->foreignIdFor(Category::class)->constrained();//
            $table->string('username');//
            $table->string('UID');//
            $table->string('linkfb');//
            $table->string('fullname');//
            $table->string('numberphone');//
            $table->string('numberbank');//
            $table->string('namebank');//
            $table->text('images');//
            $table->string('content');//
            $table->string('status');
            $table->foreignIdFor(Account::class)->constrained();
            $table->timestamps();
            $table->fullText('fullname');//
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
