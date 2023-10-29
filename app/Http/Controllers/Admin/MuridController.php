<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    Jenjang,
    Murid,
    User,
};
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    DB,
    Hash,
    Log,
};
use Illuminate\Support\Str;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Murid';

        $data['listJenjang'] = Jenjang::get();
        $data['murids'] = Murid::get();

        return view('admin.users.murid.index', $data);
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'name', 'jenjang_id', 'phone', 'email', 'password', 'alamat',
        ]);

        $data['pin'] = rand(100000, 999999);

        try {
            $request->validate([
                'name' => 'required|string',
                'jenjang_id' => 'required|integer',
                'email' => 'required|email:rfc,dns|unique:users,email|unique:gurus,email|unique:murids,email',
                'password' => 'required|min:6',
                'alamat' => 'required|string',
            ]);

            $user = new User();

            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->email_verified = 1;
            $user->email_verified_at = Carbon::now();
            $user->password = Hash::make($data['password']);
            $user->role_id = 3;
            $generate_random_string = Str::random(40);
            $user->secret_token = "TCF" . $generate_random_string;
            $user->secret_link = 'xraK1W82GFkbA0437Kfm7K86e7uI0h27SBi0N5A7';

            $user->save();

            $userId = $user->id;

            Murid::create(array_merge($data, ['user_id' => $userId]));

            $status = 'success';
            $message = 'Saved Successfully';
        } catch (\Exception $e) {
            Log::debug($e->getMessage());

            $status = 'danger';
            $message = 'Failed to Save. ' . $e->getMessage();
        }

        return redirect()->back()->with($status, $message);
    }

    public function update(Request $request)
    {
        $murid = Murid::findOrFail($request->id);
        $data = $request->only([
            'name', 'jenjang_id', 'phone', 'email', 'alamat',
        ]);

        try {
            $request->validate([
                'name' => 'required|string',
                'jenjang_id' => 'required|integer',
                'email' => 'required|email:rfc,dns|unique:users,email|unique:gurus,email|unique:murids,email',
                'alamat' => 'required|string',
            ]);

            $murid->update($data);

            $status = 'success';
            $message = 'Saved Successfully';
        } catch (\Exception $e) {
            Log::debug($e->getMessage());

            $status = 'danger';
            $message = 'Failed to Save. ' . $e->getMessage();
        }

        return redirect()->back()->with($status, $message);
    }

    public function destroy($id)
    {
        try {
            $murid = Murid::findOrFail($id);

            $murid->delete();

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
