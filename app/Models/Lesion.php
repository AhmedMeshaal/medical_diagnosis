<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lesion extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function resolveRouteBinding($value, $field = null)
    {
        return $this->where($field ?? 'id', $value)->withTrashed()->firstOrFail();
    }


    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? null, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%')
//                    ->orWhere('last_name', 'like', '%'.$search.'%')
//                    ->orWhere('email', 'like', '%'.$search.'%')
                    ->orWhereHas('area', function ($query) use ($search) {
                        $query->where('name', 'like', '%'.$search.'%');
                    });
            });
        })->when($filters['trashed'] ?? null, function ($query, $trashed) {
            if ($trashed === 'with') {
                $query->withTrashed();
            } elseif ($trashed === 'only') {
                $query->onlyTrashed();
            }
        });
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function illness(): BelongsTo
    {
        return $this->belongsTo(Illness::class);
    }

    public function playeraction(): BelongsTo
    {
        return $this->belongsTo(PlayerAction::class);
    }

    public function osiiscode(): BelongsTo
    {
        return $this->belongsTo(OsiisCode::class);
    }

    public function player(): BelongsTo
    {
        return $this->belongsTo(Player::class);
    }

    public function contacttype(): BelongsTo
    {
        return $this->belongsTo(ContactType::class);
    }

//    public function pathology_types(): HasMany
//    {
//        return $this->hasMany(Pathologytype::class);
//    }
}
