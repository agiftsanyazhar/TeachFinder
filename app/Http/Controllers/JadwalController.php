<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::with('guru', 'hari', 'mataPelajaran', 'jenjang')->get();

        return response()->json([
            'data' => $jadwal,
        ], 200);
    }

    public function jadwalFilter(Request $request)
    {
        $jadwal = Jadwal::query();
        $jadwal->join('gurus', 'gurus.id', '=', 'jadwals.guru_id');

        if ($request->has('mata_pelajaran_id')) {
            $mata_pelajaran_id = $request->input('mata_pelajaran_id');
            $jadwal->where('mata_pelajaran_id', $mata_pelajaran_id);
        }

        if ($request->has('jenjang_id')) {
            $jenjang_id = $request->input('jenjang_id');
            $jadwal->where('jenjang_id', $jenjang_id);
        }

        if ($request->has('lokasi_id')) {
            $lokasi_id = $request->input('lokasi_id');
            $jadwal->where('gurus.lokasi_id', $lokasi_id);
        }

        $jadwal->select('gurus.*', 'jadwals.*', 'gurus.name as guru_name');
        $jadwalResults = $jadwal->get();

        return response()->json(['success' => true, 'message' => 'success', 'data' => $jadwalResults]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
