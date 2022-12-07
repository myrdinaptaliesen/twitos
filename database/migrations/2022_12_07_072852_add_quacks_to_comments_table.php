<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->bigInteger('quack_id')->unsigned(); 
            $table->foreign('quack_id')
                ->references('id')
                ->on('quacks');
        });
    }

    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('quack_id');
        });
    }
};
