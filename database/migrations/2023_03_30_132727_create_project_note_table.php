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
            $table->foreignId('note_id')
                ->constrained('notes')->references('id')->onDelete('cascade');
            $table->foreignId('project_id')
                ->constrained('project')->references('id')->onDelete('cascade');
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
