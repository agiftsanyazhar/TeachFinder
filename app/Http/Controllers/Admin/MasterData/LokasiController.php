<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Lokasi;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Lokasi';

        $data['lokasis'] = Lokasi::orderBy('name')->get();

        return view('admin.master-data.lokasi', $data);
    }
}
