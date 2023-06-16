<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function consoles(): BelongsToMany
    {
        return $this->belongsToMany(Console::class);
    }

    public function publisher()
    {
        return $this->belongsTo(Publisher::class);
    }
}
