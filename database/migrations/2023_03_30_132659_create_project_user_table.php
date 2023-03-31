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
        Schema::create('project_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('project_id');

            $table->index('user_id', 'project_user_user_idx');
            $table->index('project_id', 'project_user_project_idx');

            $table->foreign('user_id', 'project_user_user_fk')->on('users')->references('id');
            $table->foreign('project_id', 'project_user_project_fk')->on('projects')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_user');
    }
};
