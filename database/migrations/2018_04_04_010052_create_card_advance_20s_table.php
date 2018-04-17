<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardAdvance20sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_advance_20s', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_number')->unique();
            $table->string('pin')->unique();
            $table->timestamp('purchase_date')->nullable()->default(DB::raw("NULL ON UPDATE CURRENT_TIMESTAMP"));
            $table->string('email')->nullable();
            $table->boolean('available')->default("1");
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
        Schema::dropIfExists('card_advance_20s');
    }
}
