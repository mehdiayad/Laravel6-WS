<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Symfony\Component\Console\Helper\Table;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {        
        Schema::create('products', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('code',15)->unique();
            $table->string('subcategory',50);
            $table->double('price',10,2);
            $table->string('brand',25);
            $table->string('description_title');
            $table->integer('category_id')->unsigned();
            $table->text('description_product');
            $table->smallInteger('stock');
            $table->string('color',15);
            $table->smallInteger('score')->default(0);
            $table->string('img_overview',50)->nullable();
            $table->string('img1',50)->nullable();
            $table->string('img2',50)->nullable();
            $table->string('img3',50)->nullable();
            $table->char('active',1)->default('1');
            $table->foreign('category_id')->references('id')->on('categories')->onUpdate("restrict")->onDelete("restrict");
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
