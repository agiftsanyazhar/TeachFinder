<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    Jadwal,
    Pesanan,
};

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Pesanan';

        $data['pesanans'] = Pesanan::get();

        return view('admin.pesanan.index', $data);
    }

    public function detail($id)
    {
        $data['title'] = 'Pesanan Detail';

        try {
            $pesanan = Pesanan::where('id', $id)->firstOrFail();

            $data['pesanans'] = $pesanan;
            $data['jadwals'] = Jadwal::where('id', $pesanan->id)->orderBy('hari_id')->get();

            return view('admin.pesanan.detail', $data);
        } catch (\Exception $e) {
            $status = 'danger';
            $message = 'Failed to save. ' . $e->getMessage();

            return redirect()->back()->with($status, $message);
        }
    }
}
