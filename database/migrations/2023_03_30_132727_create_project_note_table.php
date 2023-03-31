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
        Schema::create('project_note', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('note_id');
            $table->unsignedBigInteger('project_id');

            $table->index('note_id', 'project_note_note_idx');
            $table->index('project_id', 'project_note_project_idx');

            $table->foreign('note_id', 'project_note_note_fk')->on('notes')->references('id');
            $table->foreign('project_id', 'project_note_project_fk')->on('projects')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_note');
    }
};
