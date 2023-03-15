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
        Schema::table('users', function (Blueprint $table) {
            $table->string('title')->after('id');
            $table->string('first_name')->after('title');
            $table->string('last_name')->after('first_name');
            $table->string('address')->after('password');
            $table->string('avatar')->after('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['title','first_name', 'last_name', 'address', 'avatar']);
        });
    }
};

