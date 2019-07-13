<?php

namespace App\Services;

use App\Comment;
use Auth;

class AdminService
{
    public static function isAdminUser()
    {
        $user = Auth::user();
        return (bool) $user->is_admin ? true : false;
    }
}
