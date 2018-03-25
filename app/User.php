<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 'name', 'email', 'password', 'address', 'birthday', 'img', 'updated_at', 'created_at', 'type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function update_info ($id, $array_info) {
        $user = parent::find($id);
        if (!$user)
            return false;

        if (!isset($array_info['name']) || !isset($array_info['address']) || !isset($array_info['birthday']) || !isset($array_info['img']))
            return false;
        $user->name = $array_info['name'];
        $user->address = $array_info['address'];
        $user->birthday = $array_info['birthday'];
        $user->img = $array_info['img'];

        return $user->save();
    }
}
