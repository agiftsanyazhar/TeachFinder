<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    DB,
    Log,
};

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanan = Pesanan::with('murid', 'guru', 'jadwal')
            ->orderBy('created_at')
            ->get();

        $pesanan->each(function ($item) {
            $item->jadwal->hari->name;
            $item->murid->jenjang->name;
            $item->jadwal->mataPelajaran->name;
        });

        return response()->json([
            'data' => $pesanan,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->only([
            'murid_id', 'guru_id', 'jadwal_id',
        ]);

        try {
            Pesanan::create($data);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Success.',
                    'pesanan' => $data,
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

    public function storeArray(Request $request)
    {
        $dataArray = $request->input('pesanan');

        try {
            foreach ($dataArray as $data) {
                Pesanan::create([
                    'murid_id' => $data['murid_id'],
                    'guru_id' => $data['guru_id'],
                    'jadwal_id' => $data['jadwal_id'],
                    // tambahkan kolom lainnya yang diperlukan di sini
                ]);
            }

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Success.',
                    'pesanan' => $dataArray,
                ]
            );
        } catch (\Exception $e) {
            Log::debug($e->getMessage());

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Gagal. ' . $e->getMessage(),
                ]
            );
        }
    }


    /**
     * Display the specified resource.
     */
    public function pesananGuru(string $id)
    {
        $pesanan = Pesanan::where('guru_id', $id)->with('murid', 'guru', 'jadwal')
            ->orderBy('created_at')
            ->get();

        foreach ($pesanan as $item) {
            $item->jadwal->hari->name;
            $item->murid->jenjang->name;
            $item->jadwal->mataPelajaran->name;
            $item->guru->lokasi->name;
        };

        return response()->json([
            'data' => $pesanan,
        ], 200);
    }

    public function pesananSiswa(string $id)
    {
        $pesanan = Pesanan::where('murid_id', $id)->with('murid', 'guru', 'jadwal')
            ->orderBy('created_at')
            ->get();

        foreach ($pesanan as $item) {
            $item->jadwal->hari->name;
            $item->murid->jenjang->name;
            $item->jadwal->mataPelajaran->name;
            $item->guru->lokasi->name;
        };

        return response()->json([
            'data' => $pesanan,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $data = $request->only([
            'status', 'description',
        ]);

        try {
            $request->validate([
                'status' => 'required|integer',
                'description' => 'required|string',
            ]);

            $pesanan->update($data);

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Success.',
                    'pesanan' => $data,
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
