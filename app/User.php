<?php

namespace App;

use App\Task;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     * Get all of the tasks for the user.
     */
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function isResident()
    {
        return($this->rank > 1);
    }

    public function isAdmin()
    {
        return($this->rank > 2);
    }

    public static function getRankTitle($id) {
        $ranks = array (
              0   => 'Banned', // Permanently B&
              1 => 'Individual', // Anybody that can register
              2 => 'Resident', // Resident
              3 => 'Owner' // Administator
        );

        return isset($ranks[$id]) ? $ranks[$id] : 'Member';
    }
}
