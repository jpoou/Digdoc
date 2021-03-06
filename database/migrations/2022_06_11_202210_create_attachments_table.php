<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('attachments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('type', ['history', 'diagnosis', 'prescription', 'study']);
            $table->text('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('attachments');
    }
};