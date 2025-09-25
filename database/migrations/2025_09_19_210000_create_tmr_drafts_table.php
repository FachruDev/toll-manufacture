<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tmr_drafts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tmr_invite_id')->constrained('tmr_invites')->cascadeOnDelete();
            $table->json('payload')->nullable();
            $table->enum('status', ['in_progress','finalized'])->default('in_progress');
            $table->timestamps();
            $table->unique('tmr_invite_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tmr_drafts');
    }
};

