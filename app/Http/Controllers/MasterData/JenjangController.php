<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Jenjang;

class JenjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenjang = Jenjang::get();

        return response()->json([
            'data' => $jenjang,
        ], 200);
    }
}
