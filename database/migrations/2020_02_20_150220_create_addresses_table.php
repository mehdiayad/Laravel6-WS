<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('user_id');
            $table->string('full_name',50);
            $table->string('address',50);
            $table->string('city',20);
            $table->string('country',20);
            $table->string('postal_code',6);
            $table->string('cell_number',20);
            $table->boolean('is_billing')->default(false);
            $table->boolean('is_shipping')->default(false);
            $table->boolean('is_default')->default(false);
            $table->string('extra_detail',50)->nullable();
            $table->char('active',1)->default(1);
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
        Schema::dropIfExists('addresses');
    }
}
