<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('odk_id');
            $table->string('name');
            $table->string('phone');
            $table->string('lng')->nullable();
            $table->string('lat')->nullable();
            $table->text('addinfo')->nullable();
            $table->string('addby')->default(auth()->id());
            $table->string('risk_level')->default('Low');
            $table->bigInteger('reference_odk')->nullable();
            $table->dateTime('last_date')->nullable();
            $table->bigInteger('otp');
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
        Schema::dropIfExists('patients');
    }
}
