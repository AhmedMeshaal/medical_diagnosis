<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Account extends Model
{
    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function organizations(): HasMany
    {
        return $this->hasMany(Organization::class);
    }

    public function contacts(): HasMany
    {
        return $this->hasMany(Contact::class);
    }

    public function lesions(): HasMany
    {
        return $this->hasMany(Lesion::class);
    }

    public function areas(): HasMany
    {
        return $this->hasMany(Area::class);
    }

    public function players(): HasMany
    {
        return $this->hasMany(Player::class);
    }

    public function playeraction(): HasMany
    {
        return $this->hasMany(PlayerAction::class);
    }

    public function illness(): HasMany
    {
        return $this->hasMany(Illness::class);
    }

    public function osiiscode(): HasMany
    {
        return $this->hasMany(OsiisCode::class);
    }

    public function contacttype(): HasMany
    {
        return $this->hasMany(ContactType::class);
    }

}
