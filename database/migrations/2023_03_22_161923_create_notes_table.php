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
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->text('description');
            $table->double('hours_spend');
            $table->string('comments')->nullable();
            $table->string('type');
            $table->unsignedBigInteger('project_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

//Transferred to create_projects because of time of creation
//            $table->index('project_id','note_project_idx');
//            $table->index('user_id','note_user_idx');
//
//            $table->foreign('project_id','note_project_fk')->on('projects')->references('id');
//            $table->foreign('user_id','note_user_fk')->on('users')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notes');
    }
};
