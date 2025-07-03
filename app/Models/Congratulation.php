<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Congratulation extends Model
{
    public function person(): BelongsTo
    {
        return $this->belongsTo(Person::class);
    }
}
