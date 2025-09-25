<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Contact info
        Schema::create('information_contact_tmr_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tmr_entry_id');
            $table->foreign('tmr_entry_id', 'fk_icte_tmr')->references('id')->on('tmr_entries')->cascadeOnDelete();
            $table->string('company');
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('contact_person')->nullable();
            $table->string('email')->nullable();
            $table->timestamps();
        });

        // Product name(s)
        Schema::create('product_name_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tmr_entry_id');
            $table->foreign('tmr_entry_id', 'fk_pne_tmr')->references('id')->on('tmr_entries')->cascadeOnDelete();
            $table->string('product_name');
            $table->timestamps();
        });

        // Formulation
        Schema::create('formulation_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tmr_entry_id');
            $table->foreign('tmr_entry_id', 'fk_fe_tmr')->references('id')->on('tmr_entries')->cascadeOnDelete();
            $table->text('actives_formulation')->nullable();
            $table->timestamps();
        });

        Schema::create('formulation_technical_information_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tmr_entry_id');
            $table->foreign('tmr_entry_id', 'fk_ftie_tmr')->references('id')->on('tmr_entries')->cascadeOnDelete();
            $table->foreignId('technical_made_id');
            $table->foreign('technical_made_id', 'fk_ftie_tm')->references('id')->on('technical_mades')->cascadeOnDelete();
            $table->timestamps();
        });

        // Indication
        Schema::create('indication_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tmr_entry_id');
            $table->foreign('tmr_entry_id', 'fk_ie_tmr')->references('id')->on('tmr_entries')->cascadeOnDelete();
            $table->text('indication')->nullable();
            $table->timestamps();
        });

        // Product category
        Schema::create('product_category_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tmr_entry_id');
            $table->foreign('tmr_entry_id', 'fk_pce_tmr')->references('id')->on('tmr_entries')->cascadeOnDelete();
            $table->string('product_category');
            $table->timestamps();
        });

        // Desired Product/Format
        Schema::create('desired_format_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tmr_entry_id');
            $table->foreign('tmr_entry_id', 'fk_dfe_tmr')->references('id')->on('tmr_entries')->cascadeOnDelete();
            $table->foreignId('product_name_entry_id')->nullable();
            $table->foreign('product_name_entry_id', 'fk_dfe_pne')->references('id')->on('product_name_entries')->nullOnDelete();
            $table->foreignId('product_char_group_id');
            $table->foreign('product_char_group_id', 'fk_dfe_pcg')->references('id')->on('product_char_groups')->cascadeOnDelete();
            $table->text('notes')->nullable();
            $table->timestamps();
        });

        Schema::create('desired_format_detail_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desired_format_entry_id');
            $table->foreign('desired_format_entry_id', 'fk_dfde_dfe')->references('id')->on('desired_format_entries')->cascadeOnDelete();
            $table->foreignId('product_char_detail_id');
            $table->foreign('product_char_detail_id', 'fk_dfde_pcd')->references('id')->on('product_char_details')->cascadeOnDelete();
            $table->string('value')->nullable();
            $table->timestamps();
        });

        // Desired Packaging
        Schema::create('desired_packaging_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tmr_entry_id');
            $table->foreign('tmr_entry_id', 'fk_dpe_tmr')->references('id')->on('tmr_entries')->cascadeOnDelete();
            $table->foreignId('pack_type_group_id');
            $table->foreign('pack_type_group_id', 'fk_dpe_ptg')->references('id')->on('pack_type_groups')->cascadeOnDelete();
            $table->timestamps();
        });

        Schema::create('desired_packaging_detail_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desired_packaging_entry_id');
            $table->foreign('desired_packaging_entry_id', 'fk_dpde_dpe')->references('id')->on('desired_packaging_entries')->cascadeOnDelete();
            $table->foreignId('pack_type_detail_id');
            $table->foreign('pack_type_detail_id', 'fk_dpde_ptd')->references('id')->on('pack_type_details')->cascadeOnDelete();
            $table->string('value')->nullable();
            $table->timestamps();
        });

        // Desired Product Shelf Life
        Schema::create('desired_product_shelf_life_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tmr_entry_id');
            $table->foreign('tmr_entry_id', 'fk_dpsle_tmr')->references('id')->on('tmr_entries')->cascadeOnDelete();
            $table->string('title'); // e.g., "8 months"
            $table->timestamps();
        });

        // Raw Materials
        Schema::create('raw_materials_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tmr_entry_id');
            $table->foreign('tmr_entry_id', 'fk_rme_tmr')->references('id')->on('tmr_entries')->cascadeOnDelete();
            $table->foreignId('raw_materials_group_id');
            $table->foreign('raw_materials_group_id', 'fk_rme_rmg')->references('id')->on('raw_materials_groups')->cascadeOnDelete();
            $table->timestamps();
        });

        // Product registration BPOM
        Schema::create('product_registration_bpom_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tmr_entry_id');
            $table->foreign('tmr_entry_id', 'fk_prbe_tmr')->references('id')->on('tmr_entries')->cascadeOnDelete();
            $table->enum('title', ['galenium','principal']);
            $table->string('regist_number')->nullable();
            $table->timestamps();
        });

        // Halal registration
        Schema::create('product_registration_halal_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tmr_entry_id');
            $table->foreign('tmr_entry_id', 'fk_prhe_tmr')->references('id')->on('tmr_entries')->cascadeOnDelete();
            $table->enum('halal', ['yes','no']);
            $table->string('regist_number')->nullable();
            $table->timestamps();
        });

        // Year Forecast Order
        Schema::create('year_forecast_order_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tmr_entry_id');
            $table->foreign('tmr_entry_id', 'fk_yfoe_tmr')->references('id')->on('tmr_entries')->cascadeOnDelete();
            $table->foreignId('desired_format_entry_id')->nullable();
            $table->foreign('desired_format_entry_id', 'fk_yfoe_dfe')->references('id')->on('desired_format_entries')->nullOnDelete();
            $table->date('targeted_launch')->nullable();
            $table->decimal('targeted_price', 12, 2)->nullable();
            $table->decimal('expectation_price', 12, 2)->nullable();
            $table->timestamps();
        });

        Schema::create('year_forecast_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('year_forecast_order_entry_id');
            $table->foreign('year_forecast_order_entry_id', 'fk_yfd_yfoe')->references('id')->on('year_forecast_order_entries')->cascadeOnDelete();
            $table->string('title');
            $table->string('value')->nullable();
            $table->timestamps();
        });

        // Scope of toll manufacturing
        Schema::create('scope_toll_manufacture_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tmr_entry_id');
            $table->foreign('tmr_entry_id', 'fk_stme_tmr')->references('id')->on('tmr_entries')->cascadeOnDelete();
            $table->foreignId('scope_toll_detail_id');
            $table->foreign('scope_toll_detail_id', 'fk_stme_std')->references('id')->on('scope_toll_details')->cascadeOnDelete();
            $table->timestamps();
        });

        // Other services inquiry
        Schema::create('other_services_inquiry_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tmr_entry_id');
            $table->foreign('tmr_entry_id', 'fk_osie_tmr')->references('id')->on('tmr_entries')->cascadeOnDelete();
            $table->text('value')->nullable();
            $table->timestamps();
        });

        // Getting toll manufacturing information
        Schema::create('getting_toll_information_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tmr_entry_id');
            $table->foreign('tmr_entry_id', 'fk_gtie_tmr')->references('id')->on('tmr_entries')->cascadeOnDelete();
            $table->foreignId('getting_toll_information_detail_id');
            $table->foreign('getting_toll_information_detail_id', 'fk_gtie_gti')->references('id')->on('getting_toll_information_details')->cascadeOnDelete();
            $table->string('other_value')->nullable();
            $table->timestamps();
        });

        // TMR signatures
        Schema::create('tmr_signature_entries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tmr_entry_id');
            $table->foreign('tmr_entry_id', 'fk_tmrs_tmr')->references('id')->on('tmr_entries')->cascadeOnDelete();
            $table->foreignId('tmr_signature_role_id');
            $table->foreign('tmr_signature_role_id', 'fk_tmrs_role')->references('id')->on('tmr_signature_roles')->cascadeOnDelete();
            $table->string('name');
            $table->string('title')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tmr_signature_entries');
        Schema::dropIfExists('getting_toll_information_entries');
        Schema::dropIfExists('other_services_inquiry_entries');
        Schema::dropIfExists('scope_toll_manufacture_entries');
        Schema::dropIfExists('year_forecast_details');
        Schema::dropIfExists('year_forecast_order_entries');
        Schema::dropIfExists('product_registration_halal_entries');
        Schema::dropIfExists('product_registration_bpom_entries');
        Schema::dropIfExists('raw_materials_entries');
        Schema::dropIfExists('desired_product_shelf_life_entries');
        Schema::dropIfExists('desired_packaging_detail_entries');
        Schema::dropIfExists('desired_packaging_entries');
        Schema::dropIfExists('desired_format_detail_entries');
        Schema::dropIfExists('desired_format_entries');
        Schema::dropIfExists('product_category_entries');
        Schema::dropIfExists('indication_entries');
        Schema::dropIfExists('formulation_technical_information_entries');
        Schema::dropIfExists('formulation_entries');
        Schema::dropIfExists('product_name_entries');
        Schema::dropIfExists('information_contact_tmr_entries');
    }
};
