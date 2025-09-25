<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TmrEntry extends Model
{
    use HasFactory;

    protected $fillable = [
        'public_uuid', 'number', 'customer_id', 'status', 'request_date', 'submitted_email', 'submitted_at',
    ];

    protected $casts = [
        'submitted_at' => 'datetime',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function invitations(): HasMany
    {
        return $this->hasMany(TmrInvite::class);
    }

    public function histories(): HasMany
    {
        return $this->hasMany(TmrHistory::class);
    }

    public function approvals(): HasMany
    {
        return $this->hasMany(TmrApproval::class);
    }

    public function attachments(): HasMany
    {
        return $this->hasMany(TmrAttachment::class);
    }

    // Entry detail relations (most are hasOne/hasMany). Define common ones.
    public function contactInformation()
    {
        return $this->hasOne(InformationContactTmrEntry::class);
    }

    public function productNames(): HasMany
    {
        return $this->hasMany(ProductNameEntry::class);
    }

    public function formulation()
    {
        return $this->hasOne(FormulationEntry::class);
    }
}
