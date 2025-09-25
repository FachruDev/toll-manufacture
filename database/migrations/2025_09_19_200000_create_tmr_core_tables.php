<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tmr_entries', function (Blueprint $table) {
            $table->id();
            $table->uuid('public_uuid')->unique();
            $table->string('number')->nullable()->index(); // formatted TMR number
            $table->foreignId('customer_id')->nullable()->constrained('customers')->nullOnDelete();
            $table->enum('status', ['draft','submitted','in_review','approved','rejected','cancelled'])->default('submitted')->index();
            $table->string('submitted_email')->nullable();
            $table->timestamp('submitted_at')->nullable();
            $table->timestamps();
        });

        Schema::create('tmr_invites', function (Blueprint $table) {
            $table->id();
            $table->uuid('token')->unique();
            $table->string('email')->index();
            $table->timestamp('expires_at')->index();
            $table->timestamp('used_at')->nullable();
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('tmr_entry_id')->nullable()->constrained('tmr_entries')->nullOnDelete();
            $table->json('meta')->nullable();
            $table->timestamps();
        });

        Schema::create('tmr_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tmr_entry_id')->constrained('tmr_entries')->cascadeOnDelete();
            $table->foreignId('actor_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('actor_role')->nullable();
            $table->string('action');
            $table->text('note')->nullable();
            $table->timestamps();
        });

        Schema::create('tmr_approvals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tmr_entry_id')->constrained('tmr_entries')->cascadeOnDelete();
            $table->string('step')->index(); // e.g., r_and_d, qa, qc, eng, pr, dsp, fa
            $table->foreignId('approver_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('approver_role')->nullable();
            $table->enum('decision', ['approved','rejected','request_changes'])->nullable();
            $table->text('note')->nullable();
            $table->timestamp('decided_at')->nullable();
            $table->timestamps();
            $table->unique(['tmr_entry_id','step']);
        });

        Schema::create('tmr_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tmr_entry_id')->constrained('tmr_entries')->cascadeOnDelete();
            $table->string('path');
            $table->string('original_name')->nullable();
            $table->unsignedBigInteger('size')->nullable();
            $table->string('type')->nullable();
            $table->foreignId('uploaded_by')->nullable()->constrained('users')->nullOnDelete();
            $table->timestamps();
        });

        Schema::create('tmr_numbers', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('year');
            $table->unsignedTinyInteger('month');
            $table->unsignedInteger('last_no')->default(0);
            $table->timestamps();
            $table->unique(['year','month']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tmr_numbers');
        Schema::dropIfExists('tmr_attachments');
        Schema::dropIfExists('tmr_approvals');
        Schema::dropIfExists('tmr_histories');
        Schema::dropIfExists('tmr_entries');
        Schema::dropIfExists('tmr_invites');
    }
};
