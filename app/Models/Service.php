<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'monthly_cost',
        'unit_cost',
        'unit_type',
    ];

    public function consumptions(): HasMany
    {
        return $this->hasMany(Consumption::class);
    }
}
