<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill_menu', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(\App\Models\Menu::class); //menu_id
            $table->foreignIdFor(\App\Models\Bill::class); //bill_id
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
        Schema::dropIfExists('bill_menu');
    }
}
