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
        $guru = Guru::with('lokasi', 'alamatGuru', 'user')->get();

        return response()->json([
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
        if ($guru->phone == '') {
            return response()->json(['success' => false, 'message' => 'Telepon tidak boleh kosong.', 'data' => null]);
        }

        $check = Guru::where('phone', $guru->phone)->first();
        if ($check != null) {
            return response()->json(['success' => false, 'message' => 'Telepon telah digunakan.', 'data' => null]);
        }

        $guru->is_active = 0;

        $guru->lokasi_id = $value['lokasi_id'];
        $lokasi = Lokasi::find($value['lokasi_id']);
        if ($lokasi) {
            $lokasi_id = $lokasi->id;
        } else {
            return response()->json(['success' => false, 'message' => 'Lokasi tidak tersedia.', 'data' => null]);
        }
        $guru->lokasi_id = $lokasi_id;

        if (isset($value['skl_ijazah']) && $value['skl_ijazah'] instanceof \Illuminate\Http\UploadedFile) {
            $file = $value['skl_ijazah'];
            $gurusPath = public_path('uploads');
            $destinationPath = $gurusPath . '/gurus/skl_ijazah';

            if (!file_exists($gurusPath)) {
                mkdir($gurusPath, 0777, true);
            }

            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            if ($value) {
                $image_name = time() . '.' . $file->getClientOriginalExtension();
                $file->move($destinationPath, $image_name);
                $guru->skl_ijazah = $destinationPath . '/' . $image_name;
            }
        }

        if ($user->guru()->save($guru)) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Success',
                    'User' => $user,
                    'Guru' => $guru
                ]
            );
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal.', 'data' => $user->errors()]);
        }
    }

    public function filterGuru(Request $request)
    {
        $guru = Guru::query();
        if ($request->has('mata_pelajaran_id')) {
            $mata_pelajaran_id = $request->input('mata_pelajaran_id');
            $guru->join('jadwals', 'gurus.id', '=', 'jadwals.guru_id')->where('jadwals.mata_pelajaran_id', '=', $mata_pelajaran_id);
        }
        if (request()->has('jenjang_id')) {
            $jenjang_id = $request->input('jenjang_id');
            $guru->where('jadwals.jenjang_id', '=', $jenjang_id);
        }
        if (request()->has('lokasi_id')) {
            $lokasi_id = $request->input('lokasi_id');
            $guru->where('gurus.lokasi_id', '=', $lokasi_id);
        }
        // if (request()->has('lokasi_id')) {
        //     $lokasi_id = $request->input('lokasi_id');
        //     $guru->where('lokasi_id', '=', $lokasi_id)
        //         ->join('jadwals', 'gurus.id', '=', 'jadwals.guru_id')
        //         ->select('gurus.*', 'jadwals.*', 'gurus.name as guru_name');
        // }
        // if (request()->has('mata_pelajaran_id') && !request()->has('jenjang_id') && !request()->has('lokasi_id')) {
        //     $guru->join('jadwals', 'gurus.id', '=', 'jadwals.guru_id')
        //         ->select('gurus.*', 'jadwals.*', 'gurus.name as guru_name');
        // }
        $guru->select('gurus.*', 'jadwals.*', 'gurus.name as guru_name');
        $guruResults = $guru->get();

        return response()->json(['success' => true, 'message' => 'Success.', 'data' => $guruResults]);
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

    public function getRating()
    {
        // 
    }
}
