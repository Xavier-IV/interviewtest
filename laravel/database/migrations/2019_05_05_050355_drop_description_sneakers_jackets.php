<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropDescriptionSneakersJackets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sneakers', function (Blueprint $table){
            $table->dropColumn('description');
        });

        Schema::table('jackets', function (Blueprint $table){
            $table->dropColumn('description');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sneakers', function (Blueprint $table) {
            $table->string('description');
        });

        Schema::table('jackets', function (Blueprint $table) {
            $table->string('description');
        });
    }
}
