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
        Schema::create('workout', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('organisation_id')
                ->constrained('organisation');
            $table->foreignUuid('user_id')
                ->constrained('users');
            $table->foreignUuid('video_id')
                ->constrained('video');
            $table->string('name');
            $table->string('description');
            $table->integer('duration');
            $table->integer('intensity')->default(0);
            $table->integer('level')->default(0);
            $table->string('filename');
            $table->string('thumbnail');
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
        Schema::dropIfExists('workout');
    }
};
