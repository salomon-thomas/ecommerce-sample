<?php

namespace App\Traits;

use App\Models\Carts;
use Illuminate\Support\Facades\Auth;

trait CartTrait
{
    public function getUserCart()
    {
        $query = Carts::query();
        $query->with('variant');

        if (Auth::check()) {
            // User is authenticated, use their user ID
            $query->where('user_id', Auth::user()->id);
        } else {
            // User is not authenticated, use the session ID
            $query->Where('session_id', session()->getId());
        }
        return $query->get();
    }
}
