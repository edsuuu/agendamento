<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Procedures extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'duration',
        'photo',
        'procedure_category_id',
        'business_id',
    ];
}
