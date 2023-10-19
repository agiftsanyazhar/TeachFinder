<?php

namespace App\Http\Controllers;

use App\Models\{
    User,
};

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::get();

        return response()->json([
            'data' => $user,
        ], 200);
    }
}