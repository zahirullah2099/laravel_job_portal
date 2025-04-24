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
        Schema::create('create_resumes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); 
            
            // Section 1: Personal Info
            $table->string('profile_image')->nullable();
            $table->string('name');
            $table->string('job_title');
            $table->text('summary')->nullable();

            // Section 2: Contact Info
            $table->string('phone');
            $table->string('email');
            $table->string('location');
            $table->string('portfolio_url')->nullable();

            // Section 3: Education
            $table->string('degree');
            $table->string('level');
            $table->string('university');
            $table->string('education_duration');

            // Section 4: Experience
            $table->string('job_title_1');
            $table->text('job_description_1')->nullable();
            $table->string('job_title_2')->nullable();
            $table->text('job_description_2')->nullable();

            // Section 5: Skills
            $table->text('skills')->nullable();

            // Section 6: Languages
            $table->text('languages')->nullable();

            // Section 7: Diploma / Certifications
            $table->string('diploma_title')->nullable();
            $table->string('diploma_year')->nullable();
            $table->text('diploma_description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('create_resumes');
    }
};
