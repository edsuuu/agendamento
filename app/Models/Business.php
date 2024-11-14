<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    protected $fillable = [
        'name',
        'id_user',
        'segment_type_id',
        'documents',
        'address',
        'number_address',
        'city',
        'state',
        'zip',
        'photo',
    ];

    public function createBusiness($name, $id_user, $segment_type_id)
    {
        $created = self::create([
            'name' => $name,
            'id_user' => $id_user,
            'segment_type_id' => $segment_type_id,
        ]);

        return $created->id;
    }
}
