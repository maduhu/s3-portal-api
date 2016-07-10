<?php

namespace App\Repositories;

use Auth;
use App\User;

/**
 *
 */
class UserRepository
{
    public function createUser($userData)
    {
        $userData['password'] = bcrypt($userData['password']);
        $userData['role'] = 'user';
        return User::create($userData);
    }

    public function verify($userData)
    {
        $data = Auth::attempt(['email' => $userData['email'], 'password' => $userData['password']]);
        if ($data) {
            $userData = Auth::User();
            return $userData;
        }
        return null;
    }

    public function check($email)
    {
        return User::where('email', $email)->first();
    }
}

?>
