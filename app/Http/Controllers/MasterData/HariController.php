<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Hari;

class HariController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hari = Hari::get();

        return response()->json([
            'data' => $hari,
        ], 200);
    }
}
