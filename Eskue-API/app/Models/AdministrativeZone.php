<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Spatie\MediaLibrary\MediaCollections\Models\Concerns\HasUuid;

class AdministrativeZone extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name','short_name','state_id','country_code', 'parent_id'];

    public function countries(): array
    { return self::query()->whereNull('parent_id')->get(); }

    public function states(int $id): Collection
    { return self::query()->where('parent_id',$id)->pluck('name'); }

    public function mother(): BelongsTo
    { return $this->belongsTo(__CLASS__, 'parent_id');}

    public function children(): HasMany
    { return $this->hasMany(__CLASS__, 'parent_id'); }

    public function user(): BelongsTo
    { return $this->belongsTo(User::class, 'zone_id');}

    public function users(): HasMany
    { return $this->hasMany(User::class, 'zone_id');}

}
