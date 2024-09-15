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
        Schema::table('invoices', function (Blueprint $table) {
            $table->date('date');
            $table->integer('ponumber');
            $table->decimal('igst', 8, 2)->default(0);
            $table->decimal('cgst', 8, 2)->default(0);
            $table->decimal('sgst', 8, 2)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn('date');
            $table->dropColumn('ponumber');
            $table->dropColumn('igst');
            $table->dropColumn('cgst');
            $table->dropColumn('sgst');
        });
    }
};
