<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Authenticatable implements JWTSubject
{
    use HasFactory;
    public function getJWTIdentifier()
    {
        return $this->getkey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    protected $fillable = [
        'username',
        'nama',
        'password',
        'level_id',
    ];
    protected $table = 'm_user';
    protected $primaryKey = 'user_id';
}
