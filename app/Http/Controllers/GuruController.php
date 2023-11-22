<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Lokasi;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru = Guru::with('lokasi', 'user', 'pesanan', 'alamatGuru', 'mataPelajaran')->get();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $guru,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function Store($request, $user, $value)
    {
        $guru = new Guru();

        $guru->name = $value['name'];
        $guru->email = $value['email'];

        $guru->phone = ($value['phone']) ?? '';

        $guru->is_active = 0;

        $guru->is_verified = 1;

        $guru->lokasi_id = $value['lokasi_id'];

        $guru->mata_pelajaran_id = $value['mata_pelajaran_id'];

        try {
            if ($request->hasFile('skl_ijazah')) {
                $request->validate([
                    'skl_ijazah' => 'mimes:jpeg,jpg,png|max:2048',
                ]);

                $destinationPath = 'uploads/gurus/skl_ijazah';

                $guru->skl_ijazah = $request->file('skl_ijazah')->store($destinationPath);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Maks. ukuran SKL/Ijazah adalah 2 MB. ' . $e->getMessage(),
            ], 422);
        }

        if ($user->guru()->save($guru)) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Success',
                    'user' => $user,
                    'guru' => $guru
                ]
            );
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal.', 'data' => $user->errors()]);
        }
    }

    public function filterGuru(Request $request)
    {
        $guru = Guru::with('jadwal', 'lokasi', 'alamatGuru', 'user', 'mataPelajaran');

        if ($request->filled('mata_pelajaran_id')) {
            $mata_pelajaran_id = $request->input('mata_pelajaran_id');
            $guru->whereHas('mataPelajaran', function ($query) use ($mata_pelajaran_id) {
                $query->where('mata_pelajaran_id', $mata_pelajaran_id);
            });
        }

        if ($request->filled('jenjang_id')) {
            $jenjang_id = $request->input('jenjang_id');
            $guru->whereHas('jadwal', function ($query) use ($jenjang_id) {
                $query->where('jenjang_id', $jenjang_id);
            });
        }

        if ($request->filled('lokasi_id')) {
            $lokasi_id = $request->input('lokasi_id');
            $guru->where('lokasi_id', $lokasi_id);
        }

        $guruResults = $guru->get();
        $guru_data = $guruResults->map(function ($guru) {
            $averagePrice = $guru->jadwal->avg('harga');

            $firstJadwal = $guru->jadwal->first();
            // $nama_mata_pelajaran = $firstJadwal ? $firstJadwal->mataPelajaran->name : null;

            // $guru->nama_mata_pelajaran = $nama_mata_pelajaran;
            $ratingAverage = $guru->user->testimonialPenerima()->get()->avg('nilai');
            $testimonials = $guru->user->testimonialPenerima()->get();
            $guru->avgPrice = $averagePrice;
            $guru->ratingAverage = $ratingAverage;
            $guru->testimonials = $testimonials;

            return $guru;
        });

        return response()->json(['success' => true, 'message' => 'Success', 'data' => $guru_data]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $guru = Guru::where('user_id', $id)
            ->with('lokasi', 'user', 'pesanan', 'alamatGuru', 'mataPelajaran')
            ->get();
        if ($guru->isNotEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Success',
                'data' => $guru,
            ], 200);
        } else {
            return response()->json(['success' => false, 'message' => 'tidak ditemukan guru dengan id = ' . $id, 'data' => null]);
        }
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

    public function getRating()
    {
        //
    }
}
