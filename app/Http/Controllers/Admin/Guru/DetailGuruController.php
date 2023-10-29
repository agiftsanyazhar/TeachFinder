<?php

namespace App\Http\Controllers\Admin\Guru;

use App\Http\Controllers\Controller;
use App\Models\{
    AlamatGuru,
    Guru,
    Jadwal,
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    Log,
};

class DetailGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $data['title'] = 'Guru Detail';

        try {
            $guru = Guru::where('id', $id)->firstOrFail();

            $data['guru'] = $guru;

            $data['alamatGuru'] = AlamatGuru::where('guru_id', $guru->id)->orderBy('alamat')->get();
            $data['jadwals'] = Jadwal::where('guru_id', $guru->id)->orderBy('hari_id')->get();

            return view('admin.users.guru.detail', $data);
        } catch (\Exception $e) {
            $status = 'danger';
            $message = 'Failed to save. ' . $e->getMessage();

            return redirect()->back()->with($status, $message);
        }
    }

    public function storeAlamatGuru(Request $request)
    {
        $data = $request->only([
            'alamat', 'guru_id',
        ]);

        try {
            $request->validate([
                'alamat' => 'required|string|unique:alamat_gurus,alamat',
            ]);

            AlamatGuru::create($data);

            $status = 'success';
            $message = 'Saved Successfully';
        } catch (\Exception $e) {
            Log::debug($e->getMessage());

            $status = 'danger';
            $message = 'Failed to Save. ' . $e->getMessage();
        }

        return redirect()->back()->with($status, $message);
    }

    public function updateAlamatGuru(Request $request, $guru_id)
    {
        $alamatGuru = AlamatGuru::where(['guru_id' => $guru_id, 'id' => $request->id])->firstOrFail();
        $data = $request->only(['alamat']);

        $data['guru_id'] = $guru_id;

        try {
            $request->validate([
                'alamat' => 'required|string|unique:alamat_gurus,alamat',
            ]);

            $alamatGuru->update($data);

            $status = 'success';
            $message = 'Saved Successfully';
        } catch (\Exception $e) {
            $status = 'danger';
            $message = 'Failed to Save. ' . $e->getMessage();

            Log::error($e->getMessage());
        }

        return redirect()->back()->with($status, $message);
    }
}
