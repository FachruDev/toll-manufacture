<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('permission_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('description')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        $tableNames = config('permission.table_names');

        Schema::create('permission_category_permission', function (Blueprint $table) use ($tableNames) {
            $table->id();
            $table->foreignId('permission_category_id')
                ->constrained('permission_categories')
                ->cascadeOnDelete();

            $table->unsignedBigInteger('permission_id');
            $table->foreign('permission_id')
                ->references('id')
                ->on($tableNames['permissions'])
                ->cascadeOnDelete();

            $table->timestamps();
            $table->unique(['permission_category_id', 'permission_id'], 'pc_permission_unique');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('permission_category_permission');
        Schema::dropIfExists('permission_categories');
    }
};

