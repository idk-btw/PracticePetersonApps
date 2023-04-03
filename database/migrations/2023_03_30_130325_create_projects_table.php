<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('type');
            $table->text('description');
            $table->timestamps();
        });

        Schema::table('notes', function (Blueprint $table) {
            $table->foreignId('project_id', 'note_project_fk')
                ->references('id')->on('projects')->onDelete('cascade');
            $table->foreignId('user_id', 'note_user_fk')
                ->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
