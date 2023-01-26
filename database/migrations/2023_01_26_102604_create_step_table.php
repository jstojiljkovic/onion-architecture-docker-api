<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('step', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('video_id')
                ->constrained('video')
                ->onDelete('cascade');
            $table->string('name');
            $table->string('description');
            $table->decimal('start', 25,20);
            $table->decimal('end', 25,20);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('step');
    }
};