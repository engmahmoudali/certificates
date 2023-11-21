<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTdatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tdatas', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('certificate_num')->nullable();
			$table->string('serial')->nullable();
			$table->integer('num')->nullable();
			$table->string('document_type')->nullable();
			$table->string('date')->nullable();
			$table->string('coach_name')->nullable();
			$table->string('nation')->nullable();
			$table->text('notes')->nullable();
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
        Schema::dropIfExists('tdatas');
    }
}
