<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('hoten');
            $table->date('tgbatdau');
            $table->date('tgketthuc');
            $table->string('vitri');
            $table->string('truong');
            $table->string('gpa');
            $table->date('ngaysinh');
            $table->string('sdt');
            $table->string('email');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('interns');
    }
}
