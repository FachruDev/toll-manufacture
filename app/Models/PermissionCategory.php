<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class PermissionCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'sort_order',
    ];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_category_permission')
            ->withTimestamps();
    }
}

