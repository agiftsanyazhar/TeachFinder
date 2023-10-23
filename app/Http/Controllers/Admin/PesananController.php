<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
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
}
