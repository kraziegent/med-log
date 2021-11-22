<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTaskVerificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_task_verification', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('task_id');
            $table->foreignId('verification_id');
            $table->foreignId('trainer_id')->nullable();
            $table->foreignId('location_id')->nullable();
            $table->boolean('verified')->default(0);
            $table->timestamp('verified_at')->nullable();
            $table->char('competency_rating', 1)->nullable();
            $table->string('verifier_comment')->nullable();
            $table->foreignId('staff_id')->nullable();
            $table->string('staff_comment')->nullable();
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
        Schema::dropIfExists('user_task_verification');
    }
}
