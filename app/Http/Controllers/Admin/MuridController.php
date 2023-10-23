<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    Murid,
};

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Murid';

        $data['murids'] = Murid::get();

        return view('admin.users.murid', $data);
    }
}
