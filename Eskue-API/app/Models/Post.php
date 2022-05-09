<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\MediaCollections\Models\Concerns\HasUuid;

class Post extends Model
{
    use HasFactory, HasUuid,SoftDeletes;
    protected $fillable = ['title','description','user_id','service_id'];

    public function user(): BelongsTo
    { return $this->belongsTo(User::class);}

    public function service(): BelongsTo
    { return $this->belongsTo(Service::class);}

    public function likes(): HasMany
    { return $this->hasMany(Like::class); }

    public function comments(): HasMany
    { return $this->hasMany(Comment::class); }

}
