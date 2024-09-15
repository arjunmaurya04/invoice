<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('addclients', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('website_url')->unique();
            $table->string('email')->unique();
            $table->string('client_number')->unique();
            $table->text('address');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addclients');
    }
};
