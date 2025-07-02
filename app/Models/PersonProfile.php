<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonProfile extends Model
{
    protected $fillable = [
        'person_id',
        'passport',
        'country',
        'address',
        'place_of_birth',
        'organization',
        'position',
        'activity',
        'sex',
        'birthday'
    ];
}
