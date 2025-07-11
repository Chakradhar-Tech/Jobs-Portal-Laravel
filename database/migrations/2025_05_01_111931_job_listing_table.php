<?php

use App\Models\employer;
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
        schema::create('job_listing', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('employer_id');
            $table->foreignIdFor(employer::class);
            $table->string('title');
            $table->string('salary');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
