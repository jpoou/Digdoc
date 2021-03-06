<?php

use App\Models\Staff;
use App\Models\User;
use App\Models\Branch;
use App\Models\Patient;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Patient::class);
            $table->foreignIdFor(Branch::class);
            $table->foreignIdFor(User::class, 'creator_id');
            $table->foreignIdFor(Staff::class, 'doctor_id')->nullable();
            $table->enum('status', ['open', 'progress', 'complete'])->default('open');
            $table->date('appointment_at')->nullable();
            $table->time('from');
            $table->time('to');
            $table->text('reason');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointments');
    }
};