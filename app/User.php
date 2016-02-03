<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'role',
        'profile_photo',
        'email',
        'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * A User has many Tickets
     * returns the Tickets owned by the User
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }

    /**
     * A User has many Comments
     * returns the Comments owned by the User
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     *
     * Checks if the User is admin
     *
     * @return bool
     */
    public function is_admin()
    {
        $role = $this->role;

        if($role == 'admin')
        {
            return true;
        }
        else {
            return false;
        }
    }
}
