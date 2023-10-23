<?php

namespace App\Http\Controllers\Admin\MasterData;

use App\Http\Controllers\Controller;
use App\Models\Hari;

class HariController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Hari';

        $data['haris'] = Hari::get();

        return view('admin.master-data.hari', $data);
    }
}
