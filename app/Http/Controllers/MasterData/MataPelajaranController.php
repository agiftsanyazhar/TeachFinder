<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaran;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mataPelajaran = MataPelajaran::get();

        return response()->json([
            'data' => $mataPelajaran,
        ], 200);
    }
}
