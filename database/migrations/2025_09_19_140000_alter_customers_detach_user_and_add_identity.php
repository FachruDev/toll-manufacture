<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            if (Schema::hasColumn('customers', 'user_id')) {
                $table->dropConstrainedForeignId('user_id');
            }
            if (! Schema::hasColumn('customers', 'name')) {
                $table->string('name')->after('id');
            }
            if (! Schema::hasColumn('customers', 'email')) {
                $table->string('email')->unique()->after('name');
            }
        });
    }

    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            if (Schema::hasColumn('customers', 'email')) {
                $table->dropUnique('customers_email_unique');
                $table->dropColumn('email');
            }
            if (Schema::hasColumn('customers', 'name')) {
                $table->dropColumn('name');
            }
            if (! Schema::hasColumn('customers', 'user_id')) {
                $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            }
        });
    }
};

