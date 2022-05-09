<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Concerns\HasUuid;

class Like extends Model
{
    use HasFactory, HasUuid, SoftDeletes;

    protected $fillable = ['user_id','post_id'];

    public function user(): BelongsTo
    { return $this->belongsTo(User::class);}

    public function post(): BelongsTo
    { return $this->belongsTo(User::class);}
}
