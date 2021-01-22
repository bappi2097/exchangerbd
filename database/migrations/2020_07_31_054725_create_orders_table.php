<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wallet_account_id')->constrained('wallet_accounts');
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('send_wallet_name');
            $table->string('receive_wallet_name');
            $table->double('send_amount');
            $table->double('receive_amount');
            $table->string('sending_contact');
            $table->string('receiving_contact');
            $table->string('tnxid')->unique();
            $table->tinyInteger('status')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
