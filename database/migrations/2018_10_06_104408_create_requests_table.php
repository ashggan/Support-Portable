<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('ticket')->autoIncrement();
            $table->text('detials');
            $table->integer('client_id')->unsigned();
            $table->string('screenshots')->nullable();
            $table->string('status')->default('not_yet');
            $table->string('prioirty')->default('normal');
            $table->string('assignee')->nullable();
            $table->integer('leadtime')->nullable();
        });

         Schema::table('requests', function(Blueprint  $table){
                 $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
                 $table->foreign('assignee')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
