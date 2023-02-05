<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $table = "user";

    protected $fillable = [
        'name_full',
        'username',
        'password',
        'email',
        'role_id',
    ];

    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
}
