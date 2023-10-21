<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\Murid;
use Illuminate\Http\Request;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $murid = Murid::with('jenjang')->get();

        return response()->json([
            'data' => $murid,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function Store(Request $request, $user, $value)
    {
        $murid = new Murid();

        $murid->name = $value['name'];
        $murid->email = $value['email'];

        $murid->phone = ($value['phone']) ?? '';
        if ($murid->phone == '') {
            return response()->json(['success' => false, 'message' => 'Telepon tidak boleh kosong.', 'data' => null]);
        }

        $check = Murid::where('phone', $murid->phone)->first();
        if ($check != null) {
            return response()->json(['success' => false, 'message' => 'Telepon telah digunakan.', 'data' => null]);
        }

        $murid->pin = $value['pin'];
        $jenjang = Jenjang::find($value['jenjang_id']);
        if ($jenjang) {
            $jenjang_id = $jenjang->id;
        }
        $murid->jenjang_id = $jenjang_id;
        $murid->alamat = $value['alamat'];

        if ($user->murid()->save($murid)) {
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Success.',
                    'User' => $user,
                    'Murid' => $murid
                ]
            );
        } else {
            return response()->json(['success' => false, 'message' => 'Gagal.', 'data' => $user->errors()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
