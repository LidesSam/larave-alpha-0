<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('request_state', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('def_es');
        });

        // Default states
        // 1. pending
        // 2. approved
        // 3. cancelled

        Schema::create('request_type', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('def_es');
        });

        // Default types
        // 1. turn

        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id'); // permission id
            $table->string('email');
            $table->string('message');
            $table->unsignedBigInteger('state_id'); // foreign key
            $table->unsignedBigInteger('type_id'); // foreign key
            $table->date('turndate')->nullable(); // corrected column type and name
            $table->string('hash', 64); // Ensure the length is sufficient for the hash
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('state_id')->references('id')->on('request_state')->onDelete('cascade');
            $table->foreign('type_id')->references('id')->on('request_type')->onDelete('cascade');
        });


        DB::table('request_state')->insert([
            ['def_es' => 'pending'],
            ['def_es' => 'approved'],
            ['def_es' => 'cancelled'],
            ['def_es' => 'rejected'],
        ]);
        
        // Insert default types
        DB::table('request_type')->insert([
            ['def_es' => 'turn'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');
        Schema::dropIfExists('request_type');
        Schema::dropIfExists('request_state');
    }
};
