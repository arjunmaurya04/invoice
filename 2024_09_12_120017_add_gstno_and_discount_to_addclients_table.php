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
        Schema::table('addclients', function (Blueprint $table) {
            $table->string('gstno')->nullable();
            $table->decimal('discount', 8, 2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('addclients', function (Blueprint $table) {
            $table->dropColumn('gstno');
            $table->dropColumn('discount');
        });
    }
};
