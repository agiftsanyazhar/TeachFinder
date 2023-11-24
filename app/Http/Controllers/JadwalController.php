<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Auth,
    DB,
    Log,
};

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jadwal = Jadwal::with('guru', 'hari', 'jenjang')->get();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $jadwal,
        ], 200);
    }

    public function filterJadwal(Request $request)
    {
        $jadwal = Jadwal::with('guru.mataPelajaran', 'hari', 'jenjang');

        if ($request->filled('mata_pelajaran_id')) {
            $mata_pelajaran_id = $request->input('mata_pelajaran_id');
            $jadwal->whereHas('guru.mataPelajaran', function ($query) use ($mata_pelajaran_id) {
                $query->where('mata_pelajaran_id', $mata_pelajaran_id);
            });
        }

        if ($request->filled('jenjang_id')) {
            $jenjang_id = $request->input('jenjang_id');
            $jadwal->where('jenjang_id', $jenjang_id);
        }

        if ($request->filled('guru_id')) {
            $guru_id = $request->input('guru_id');
            $jadwal->where('guru_id', $guru_id);
        }

        if ($request->filled('lokasi_id')) {
            $lokasi_id = $request->input('lokasi_id');
            $jadwal->whereHas('guru', function ($query) use ($lokasi_id) {
                $query->where('lokasi_id', $lokasi_id);
            });
        }

        $jadwalResults = $jadwal->get();

        if ($jadwalResults->isNotEmpty()) {
            return response()->json(['success' => true, 'message' => 'success', 'data' => $jadwalResults]);
        } else {
            return response()->json(['success' => true, 'message' => 'Jadwal not found with your filter', 'data' => $jadwalResults]);
        }
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $guru = $request->get('guru');
        if ($guru) {
            $data = $request->only([
                'name', 'guru_id', 'hari_id',
                'jenjang_id', 'waktu_mulai', 'waktu_akhir', 'harga'
            ]);

            try {
                $request->validate([
                    'waktu_mulai' => 'required|string',
                    'waktu_akhir' => 'required|string',
                    'harga' => 'required|integer',
                ]);

                Jadwal::create($data);

                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Success.',
                        'jadwal' => $data,
                    ]
                );
            } catch (\Exception $e) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'Gagal. ' . $e->getMessage(),
                    ]
                );
                Log::debug($e->getMessage());
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $jadwal = Jadwal::where('guru_id', $id)
            ->with('guru', 'hari', 'jenjang', 'pesanan')
            ->get();

        if ($jadwal->isNotEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Success',
                'data' => $jadwal,
            ], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'Jadwal untuk guru dengan id=' . $id . ' kosong', 'data' => null]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::findOrFail($id);
        $data = $request->only([
            'name', 'guru_id', 'hari_id',
            'jenjang_id', 'waktu_mulai', 'waktu_akhir', 'harga'
        ]);

        try {
            $request->validate([
                'waktu_mulai' => 'required|string',
                'waktu_akhir' => 'required|string',
                'harga' => 'required|integer',
            ]);

            $jadwal->update($data);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Success.',
                    'jadwal' => $data,
                ]
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Gagal. ' . $e->getMessage(),
                ]
            );
            Log::debug($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $jadwal = Jadwal::findOrFail($id);

            $jadwal->delete();

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Success.',
                ]
            );
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Gagal. ' . $e->getMessage(),
                ]
            );
            Log::debug($e->getMessage());
        }
    }
}
