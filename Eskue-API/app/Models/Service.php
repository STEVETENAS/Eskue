<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, HasFactory, SoftDeletes;

    protected $fillable = ['title','type_id'];

    public function type(): BelongsTo
    { return $this->belongsTo(ServiceType::class, 'type_id'); }

    public function users(): HasMany
    { return $this->hasMany(User::class); }

    public function posts(): HasMany
    { return $this->hasMany(Post::class); }
}
