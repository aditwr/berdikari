<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class User
{
    public static function getUsername($user_id)
    {
        $user = DB::table('users')->where('id', $user_id)->first();
        return $user->name;
    }

    public static function getEmail($user_id)
    {
        $user = DB::table('users')->where('id', $user_id)->first();
        return $user->email;
    }
}
