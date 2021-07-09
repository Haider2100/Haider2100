<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhotosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('photocaption');
            $table->string('description')->nullable();
            $table->string('imagename');
            $table->enum('status',['pending','approved','reject','selling','rated','agree','buy-out','decline'])->default('pending');
            $table->unsignedBigInteger('approved_by')->nullable();
            $table->date('approved_date')->nullable();
            $table->unsignedBigInteger('buyout_by')->nullable();
            $table->date('buyout_date')->nullable();
            $table->float('buyrate')->default(0.00);
            $table->timestamps();

            $table->foreign('approved_by')->references('id')->on('admins');
            $table->foreign('buyout_by')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
