<?php

namespace App;

use Dirape\Token\Token;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    const TYPE_USER = 0;
    const TYPE_ADMIN = 1;
    const TYPE_ROOT = 2;

    use Notifiable;
    protected $fillable = [
        'id', 'name', 'email', 'password', 'address', 'birthday', 'img', 'updated_at', 'created_at', 'type'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function logs() {
        return $this->hasMany('App\Model\UserLog', 'user_id');
    }

    public function update_info ($array_info) {

        if (!isset($array_info['name']) || !isset($array_info['address']) || !isset($array_info['birthday']) || !isset($array_info['img']))
            return false;
        $this->name = $array_info['name'];
        $this->address = $array_info['address'];
        $this->birthday = $array_info['birthday'];

        if ($array_info['img']) {
            $this->img = $array_info['img'];
        }

        return $this->save();
    }

    public static function add_admin($email, $name) {
        return User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make('123456'),
            'type' => User::TYPE_ADMIN,
        ]);
    }

    public static function checkToken($token) {
        $user = self::where('api_token',$token)->first();

        return $user ? true : false;
    }

    public function setApiToken() {
        $token = new Token();
        $this->api_token = $token->unique('users', 'api_token', 100);
        $this->save();
    }
}
