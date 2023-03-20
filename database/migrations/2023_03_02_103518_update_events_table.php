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
        Schema::table('events', function (Blueprint $table) {
            $table->dateTime('start_date')->change();
            $table->dateTime('end_date')->change()->after('start_date');
            $table->string('location')->after('end_date');
            $table->string('duration')->nullable()->after('price');
            $table->string('additional_info')->nullable()->after('location');
            $table->string('organizer')->after('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('events', function (Blueprint $table) {
            $table->date('end_date')->change();
            $table->date('start_date')->change();
            $table->dropColumn('location');
            $table->dropColumn('duration');
            $table->dropColumn('additional_info');
            $table->dropColumn('organizer');
        });
    }
};
