<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropDescriptionAddBrand extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sneakers', function (Blueprint $table) {
            $table->string('brand')->after('name');
        });

        Schema::table('jackets', function (Blueprint $table) {
            $table->string('brand')->after('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sneakers');
            $table->string('description');

        Schema::dropIfExists('jackets');
            $table->string('description');
    }
}
