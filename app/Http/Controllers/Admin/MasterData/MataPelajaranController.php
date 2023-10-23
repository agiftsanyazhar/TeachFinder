<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaran;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Mata Pelajaran';

        $data['mataPelajarans'] = MataPelajaran::orderBy('name')->get();

        return view('admin.master-data.mata-pelajaran', $data);
    }
}
