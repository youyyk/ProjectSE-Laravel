<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart_menu', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Cart::class); //menu_id
            $table->foreignIdFor(\App\Models\Menu::class); //menu_id
            $table->integer('total')->default(1);
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
        Schema::dropIfExists('cart_menu');
    }
}
