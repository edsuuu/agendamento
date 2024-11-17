<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'photo',
        'email_verified_at',
        'password',
        'google_id',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'google_id',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public function createUser($firstname, $lastname, $email, $password, $phone, $role)
    {

//        dd($firstname, $lastname, $email, $password, $phone);
        $created = self::create([
            'first_name' => $firstname,
            'last_name' => $lastname,
            'email' => $email,
            'password' => $password,
            'phone' => $phone,
            'role' => $role,
        ]);

        return $created;
    }

    public function business()
    {
        return $this->hasOne(Business::class, 'id_user', 'id');
    }


}
