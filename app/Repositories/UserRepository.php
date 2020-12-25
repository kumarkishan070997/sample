<?php

namespace App\Repositories;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserRepository
{
    public function userRecord()
    {
        try{
            $user_data = User::all();
            return $user_data;
        }
        catch (\Exception $e) {
            Log::error(
                'Failed to fetch data'
            );
            return false;
        }

        
    }
}
