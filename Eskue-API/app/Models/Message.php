<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Concerns\HasUuid;

class Message extends Model
{
    use HasFactory, HasUuid, SoftDeletes;

    protected $fillable = ['sender_id','receiver_id','text'];

    public function sender(): BelongsTo
    { return $this->belongsTo(User::class,'sender_id');}

    public function receiver(): BelongsTo
    { return $this->belongsTo(User::class,'receiver_id');}

}
