<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'segment_type_id',
        'documents',
        'address',
        'number_address',
        'city',
        'state',
        'zip',
        'photo',
    ];
}
