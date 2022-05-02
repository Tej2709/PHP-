<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeeAddresses extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee_addresses', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            //$table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
            $table->string('city');
            $table->string('state');
            $table->string('country');
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
        Schema::dropIfExists('employee_addresses');
    }
}
