<?php

namespace App\Services;

use Auth;
use App\User;

class AdminService
{
    /**
     * Is the Auth User Admin?
     *
     * @return bool
     */
    public static function isAdminUser()
    {
        $user = Auth::user();
        return (bool)$user->is_admin ? true : false;
    }

    /**
     * Abort if the auth user is not admin.
     */
    public static function abortNotAdmin()
    {
        if (!self::isAdminUser()) {
            abort(404);
        }
    }

    /**
     * Set the user Banner Status
     *
     * @param int $userId
     * @param int $banned_status
     * @return bool
     */
    public static function setBanned($userId = 0, $banned_status = 0)
    {
        self::abortNotAdmin();

        try {
            $user = User::findOrFail($userId);
            $user->banned = $banned_status;
            $user->save();
            return true;
        } catch (\Exception $ex) {
            abort(404);
        }
    }

    /**
     * Is the user banned.
     *
     * @param int $userId
     * @return bool
     */
    public static function isUserBanned($userId = 0)
    {
        try {
            $user = User::findOrFail($userId);
            if ((bool)$user->banned) {
                abort(404);
            }
        } catch (\Exception $ex) {
            abort(404);
        }
    }
}
