<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Jenjang;

class JenjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Jenjang';

        $data['jenjangs'] = Jenjang::get();

        return view('admin.master-data.jenjang', $data);
    }
}
