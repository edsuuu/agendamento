<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;
class Business extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;

    protected $table = 'business';

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
        'referral_source',
        'neighborhood'
    ];
}
