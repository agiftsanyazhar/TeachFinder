<?php

namespace App\Http\Controllers\Admin\Guru;

use App\Http\Controllers\Controller;
use App\Models\{
    AlamatGuru,
    Guru,
    Hari,
    Jadwal,
    Jenjang,
    MataPelajaran,
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    DB,
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

            $data['listHari'] = Hari::get();
            $data['listMataPelajaran'] = MataPelajaran::orderBy('name')->get();
            $data['listJenjang'] = Jenjang::get();

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

    public function storeJadwal(Request $request)
    {
        $data = $request->only([
            'name', 'mata_pelajaran_id', 'jenjang_id', 'hari_id', 'waktu_mulai',
            'waktu_akhir', 'harga', 'guru_id',
        ]);

        try {
            $request->validate([
                'name' => 'required|string|unique:jadwals,name',
                'mata_pelajaran_id' => 'required|integer',
                'jenjang_id' => 'required|integer',
                'hari_id' => 'required|integer',
                'waktu_mulai' => 'required',
                'waktu_akhir' => 'required',
                'harga' => 'required|integer',
            ]);

            Jadwal::create($data);

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

    public function updateJadwal(Request $request, $guru_id)
    {
        $jadwal = Jadwal::where(['guru_id' => $guru_id, 'id' => $request->id])->firstOrFail();
        $data = $request->only([
            'name', 'mata_pelajaran_id', 'jenjang_id', 'hari_id', 'waktu_mulai',
            'waktu_akhir', 'harga', 'guru_id',
        ]);

        $data['guru_id'] = $guru_id;

        try {
            $request->validate([
                'name' => 'required|string|unique:jadwals,name',
                'mata_pelajaran_id' => 'required|integer',
                'jenjang_id' => 'required|integer',
                'hari_id' => 'required|integer',
                'waktu_mulai' => 'required',
                'waktu_akhir' => 'required',
                'harga' => 'required|integer',
            ]);

            $jadwal->update($data);

            $status = 'success';
            $message = 'Saved Successfully';
        } catch (\Exception $e) {
            $status = 'danger';
            $message = 'Failed to Save. ' . $e->getMessage();

            Log::error($e->getMessage());
        }

        return redirect()->back()->with($status, $message);
    }

    public function destroyAlamatGuru($guru_id, $id)
    {
        try {
            $alamatGuru = AlamatGuru::where(['guru_id' => $guru_id, 'id' => $id])->firstOrFail();

            $alamatGuru->delete();

            $status = 'success';
            $message = 'Deleted Successfully';
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e->getMessage());

            $status = 'danger';
            $message = 'Failed to Delete. ' . $e->getMessage();
        }

        return redirect()->back()->with($status, $message);
    }

    public function destroyJadwal($guru_id, $id)
    {
        try {
            $jadwal = Jadwal::where(['guru_id' => $guru_id, 'id' => $id])->firstOrFail();

            $jadwal->delete();

            $status = 'success';
            $message = 'Deleted Successfully';
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e->getMessage());

            $status = 'danger';
            $message = 'Failed to Delete. ' . $e->getMessage();
        }

        return redirect()->back()->with($status, $message);
    }
}
