<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckValuationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('check_valuations', function (Blueprint $table) {
            $table->id();
            $table->string('company_id');
            $table->string('make_id');
            $table->string('modal_id');
            $table->string('body_id');
            $table->string('year_id');
            $table->string('valuation');
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
        Schema::dropIfExists('check_valuations');
    }
}
