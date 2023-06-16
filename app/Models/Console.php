<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Console extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function games(): BelongsToMany
    {
        return $this->belongsToMany(Game::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
