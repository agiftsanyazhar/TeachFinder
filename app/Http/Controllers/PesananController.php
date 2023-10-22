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

        return response()->json([
            'success' => true,
            'message' => 'Success',
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
