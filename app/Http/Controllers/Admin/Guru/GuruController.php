<?php

namespace App\Http\Controllers\Admin\Guru;

use App\Http\Controllers\Controller;
use App\Models\{
    AlamatGuru,
    Guru,
    Jadwal,
    Lokasi,
    MataPelajaran,
    User,
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{
    DB,
    Hash,
    Log,
};
use Illuminate\Support\Str;

class GuruController extends Controller
{
    private $uploadPath;

    public function __construct()
    {
        $this->uploadPath = 'uploads/gurus/skl_ijazah';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Guru';

        $data['listLokasi'] = Lokasi::orderBy('name')->get();
        $data['listMataPelajaran'] = MataPelajaran::orderBy('name')->get();
        $data['gurus'] = Guru::get();

        return view('admin.users.guru.index', $data);
    }

    public function store(Request $request)
    {
        $data = $request->only([
            'name', 'lokasi_id', 'phone', 'mata_pelajaran_id', 'email', 'password', 'description',
            'image', 'skl_ijazah'
        ]);

        try {
            $request->validate([
                'name' => 'required|string',
                'lokasi_id' => 'required|integer',
                'phone' => 'required|string|unique:gurus,phone|unique:murids,phone',
                'mata_pelajaran_id' => 'required|integer',
                'email' => 'required|email:rfc,dns|unique:users,email|unique:gurus,email|unique:murids,email',
                'password' => 'required|min:8',
                'description' => 'string',
                'image' => 'mimes:jpeg,jpg,png|max:2048',
                'skl_ijazah' => 'mimes:jpeg,jpg,png|max:2048',
            ]);

            $user = new User();

            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            $user->role_id = 2;
            $generate_random_string = Str::random(40);
            $user->secret_token = "TCF" . $generate_random_string;
            $user->secret_link = 'xraK1W82GFkbA0437Kfm7K86e7uI0h27SBi0N5A7';

            if ($request->hasFile('image')) {
                $user->image = $request->file('image');
            }

            if ($request->hasFile('skl_ijazah')) {
                $sklIjazah = $request->file('skl_ijazah');
                $data['skl_ijazah'] = $sklIjazah->store($this->uploadPath);
            }

            $user->save();

            $userId = $user->id;

            Guru::create(array_merge($data, ['user_id' => $userId]));

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
        $guru = Guru::findOrFail($request->id);
        $data = $request->only([
            'name', 'lokasi_id', 'phone', 'mata_pelajaran_id', 'email',  'description', 'skl_ijazah'
        ]);

        try {
            $request->validate([
                'name' => 'required|string',
                'lokasi_id' => 'required|integer',
                'phone' => 'required|string|unique:gurus,phone|unique:murids,phone',
                'mata_pelajaran_id' => 'required|integer',
                'email' => 'required|email:rfc,dns|unique:users,email|unique:gurus,email|unique:murids,email',
                'description' => 'string',
                'skl_ijazah' => 'mimes:jpeg,jpg,png|max:2048',
            ]);

            if ($request->hasFile('skl_ijazah')) {
                $sklIjazah = $request->file('skl_ijazah');
                $data['skl_ijazah'] = $sklIjazah->store($this->uploadPath);
            }

            $guru->update($data);

            $status = 'success';
            $message = 'Saved Successfully';
        } catch (\Exception $e) {
            Log::debug($e->getMessage());

            $status = 'danger';
            $message = 'Failed to Save. ' . $e->getMessage();
        }

        return redirect()->back()->with($status, $message);
    }

    public function updateStatus(Request $request)
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

    public function destroy($id)
    {
        try {
            $guru = Guru::findOrFail($id);

            $guru->delete();

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
