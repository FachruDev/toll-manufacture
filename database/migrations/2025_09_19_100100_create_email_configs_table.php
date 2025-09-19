<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('email_configs', function (Blueprint $table) {
            $table->id();
            $table->string('event_key'); // e.g., 'tmr.submitted'
            $table->json('send_to_roles')->nullable(); // ["superadmin","admin",...]
            $table->json('send_to_users')->nullable(); // [user_id,...]
            $table->json('send_to_emails')->nullable(); // ["foo@bar.com",...]
            $table->boolean('active')->default(true);
            $table->timestamps();

            $table->index(['event_key', 'active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('email_configs');
    }
};

