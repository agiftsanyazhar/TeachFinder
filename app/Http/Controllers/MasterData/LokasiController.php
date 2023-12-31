<?php

namespace App\Http\Controllers\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Lokasi;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lokasi = Lokasi::orderBy('name')->get();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $lokasi,
        ], 200);
    }
}
