<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_books', function (Blueprint $table) {
            $table->increments('id');
            $table->string("first_name");
            $table->string("last_name");
            $table->string("profile_pic");
            $table->string("email");
            $table->integer("phone");
            $table->string("street");
            $table->integer("zip_code");
            $table->integer("city");
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
        Schema::dropIfExists('address_books');
    }
}
