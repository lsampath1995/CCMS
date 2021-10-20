<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourtTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('court_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('advocate_id')->unsigned();
            $table->text('court_type_name')->nullable();
            $table->enum('is_active', array('Yes', 'No'))->default('Yes');
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
        Schema::dropIfExists('court_types');
    }
}
