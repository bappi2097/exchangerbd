<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWalletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wallets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->double('buy')->default(0);
            $table->double('sell')->default(0);
            $table->string('wallet_img')->nullable();
            $table->double('minimum')->default(30);
            $table->double('cost')->default(0);
            $table->double('reserve')->default(0);
            $table->double('original_cost')->default(0);
            $table->double('original_reserve')->default(0);
            $table->boolean('is_bd');
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
        Schema::dropIfExists('wallets');
    }
}
