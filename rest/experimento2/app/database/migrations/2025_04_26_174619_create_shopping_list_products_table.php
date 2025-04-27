<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('shopping_list_products', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique()->default(DB::raw('gen_random_uuid()'));
            $table->foreignId('shopping_list_id')->references('id')->on('shopping_lists');

            $table->string('name');
            $table->integer('qty');

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
        Schema::dropIfExists('shopping_list_products');
    }
};
