<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    AlamatGuru,
    Guru,
    Jadwal,
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    DB,
    Log,
};

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Guru';

        $data['gurus'] = Guru::get();

        return view('admin.users.guru.index', $data);
    }

    public function update(Request $request)
    {
        try {
            DB::table('gurus')
                ->where('id', $request->id)
                ->update([
                    'is_verified' => 1,
                ]);

            $status = 'success';
            $message = 'Saved Successfully';
        } catch (\Exception $e) {
            DB::rollBack();
            Log::debug($e->getMessage());
            $status = 'danger';
            $message = 'Failed to save. ' . $e->getMessage();
        }
        return redirect()->back()->with($status, $message);
    }

    public function detail($id)
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
}
