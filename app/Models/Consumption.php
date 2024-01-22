<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Consumption extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_id',
        'quantity',
        'created_at',
    ];

    public function service(): BelongsTo
    {
        return $this->belongsTo(Service::class);
    }
}
