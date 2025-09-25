<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('technical_mades', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique(); // Galenium, Principal
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Desired Product/Format
        Schema::create('product_char_groups', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique(); // Tablet, Caplet, etc.
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('product_char_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_char_group_id')->constrained('product_char_groups')->cascadeOnDelete();
            $table->string('field_title');
            $table->string('input_type')->default('text');
            $table->boolean('is_required')->default(false);
            $table->timestamps();
        });

        // Desired Packaging
        Schema::create('pack_type_groups', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('pack_type_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pack_type_group_id')->constrained('pack_type_groups')->cascadeOnDelete();
            $table->string('field_title');
            $table->string('input_type')->default('text');
            $table->boolean('is_required')->default(false);
            $table->timestamps();
        });

        // Raw Materials
        Schema::create('raw_materials_groups', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('raw_materials_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('raw_materials_group_id')->constrained('raw_materials_groups')->cascadeOnDelete();
            $table->string('title');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Scope of Toll Manufacturing
        Schema::create('scope_toll_details', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->timestamps();
        });

        // Getting Toll Manufacturing Information
        Schema::create('getting_toll_information_details', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->timestamps();
        });

        // TMR Signature Roles
        Schema::create('tmr_signature_roles', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tmr_signature_roles');
        Schema::dropIfExists('getting_toll_information_details');
        Schema::dropIfExists('scope_toll_details');
        Schema::dropIfExists('raw_materials_details');
        Schema::dropIfExists('raw_materials_groups');
        Schema::dropIfExists('pack_type_details');
        Schema::dropIfExists('pack_type_groups');
        Schema::dropIfExists('product_char_details');
        Schema::dropIfExists('product_char_groups');
        Schema::dropIfExists('technical_mades');
    }
};

