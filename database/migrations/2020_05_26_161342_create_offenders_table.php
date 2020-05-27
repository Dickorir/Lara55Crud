<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offenders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('doc_no')->unique();
            $table->string('name');
            $table->string('gender')->default('Male');
            $table->string('citizenship')->default('Other');
            $table->string('race')->default('Other');
            $table->string('age_variance')->default('0 - 10');
            $table->dateTime('dob')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('marital_status')->default('Single');
            $table->string('hair_color')->default('Other');
            $table->string('eye_color')->default('Other');
            $table->float('height')->default(0);
            $table->float('weight')->default(0);
            $table->string('religion')->default('Other');
            $table->string('education')->default('none');
            $table->string('residence')->default('Other');
            $table->string('cluster')->default('Other');
            $table->string('special_need')->default(false);
            $table->string('special_need_category')->nullable();
            $table->longText('special_need_details')->nullable();
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
        Schema::dropIfExists('offenders');
    }
}
