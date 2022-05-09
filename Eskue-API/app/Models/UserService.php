<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Concerns\HasUuid;

class UserService extends Pivot
{
    use HasFactory, HasUuid, SoftDeletes;

    protected $fillable = ['service_id','user_id'];

    public function user(): BelongsTo
    { return $this->belongsTo(User::class); }

    public function service(): BelongsTo
    { return $this->belongsTo(Service::class); }
}
