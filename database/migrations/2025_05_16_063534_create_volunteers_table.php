<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->string('volunteer_id')->unique();
            $table->string('full_name');
            $table->string('initials_name');
            $table->string('district');
            $table->text('address');
            $table->string('nic_number');
            $table->date('date_of_birth');
            $table->date('joined_date')->nullable();
            $table->enum('status', ['School Leaver', 'Undergraduate', 'Graduate', 'Professional', 'Entrepreneur']);
            $table->string('institution');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('whatsapp')->nullable();
            $table->enum('referred_by', ['Friends', 'Social Media', 'Newspapers', 'Others']);
            $table->text('reason_to_join');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};
