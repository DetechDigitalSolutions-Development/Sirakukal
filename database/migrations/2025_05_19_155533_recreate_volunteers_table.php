<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::dropIfExists('volunteers');
        
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            
            // Required fields from validation
            $table->string('full_name');
            $table->string('initials_name');
            $table->enum('district', array_values(\App\Models\Volunteer::DISTRICTS));
            $table->string('address', 500);
            $table->string('nic_number'); // Validated by regex
            $table->date('date_of_birth');
            $table->enum('applicant_type', array_values(\App\Models\Volunteer::EDUCATION_LEVELS));
            $table->string('institution');
            $table->string('email');
            $table->string('phone', 15);
            $table->enum('referred_by', array_values(\App\Models\Volunteer::HEARD_SOURCES));
            $table->text('reason_to_join');
            
            // Optional fields
            $table->string('whatsapp', 15)->nullable();
            $table->date('joined_date')->default(now());
            
            // Status fields
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('volunteers');
    }
};