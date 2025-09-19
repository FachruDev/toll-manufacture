<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('employee_id')->nullable()->unique()->after('password');
            $table->string('phone')->nullable()->after('employee_id');
            $table->string('image_path')->nullable()->after('phone');
            $table->foreignId('department_id')->nullable()->constrained('departments')->nullOnDelete()->after('image_path');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropConstrainedForeignId('department_id');
            $table->dropColumn(['employee_id', 'phone', 'image_path']);
        });
    }
};

