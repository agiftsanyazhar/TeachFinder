<?php

namespace App\Http\Controllers;

use App\Models\{
    User,
    Guru,
    Lokasi,
    MataPelajaran,
    Murid
};
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::get();

        return response()->json([
            'success' => true,
            'message' => 'Success',
            'data' => $user,
        ], 200);
    }

    public function show(Request $request)
    {
        $user = $request->get('user');

        if ($user) {
            if ($user->role_id == 2) {
                $user->load('guru');
            } else if ($user->role_id == 3) {
                $user->load('murid');
            }

            return response()->json(
                [
                    'success' => true,
                    'message' => 'Success',
                    'User' => $user,
                ]
            );
        }

        return response()->json(
            [
                'success' => false,
                'message' => 'User not found',
            ],
            404
        );
    }
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $result = [];
        if (empty($email) || empty($password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Email & password tidak boleh kosong.',
                'data' => ["email" => $email, "password" => $password]
            ], 401);
        } else {
            try {
                $user = User::where('email', $email)->first();

                if ($user) {
                    if (Hash::check($password, $user->password)) {
                        if ($user->email_verified == 0) {
                            $result["success"] = true;
                            $result["message"] = "Akun anda belum aktif. Silakan cek email Anda.";
                            unset($user->password);
                            $result["user"] = $user;
                        } else {
                            $generate_random_string = Str::random(40); // Generate random string
                            $user->secret_token = "TCF" . $generate_random_string;
                            $user->save();

                            $result['success'] = true;
                            $result['message'] = "Success login.";
                            unset($user->password);
                            $result["user"] = $user;
                        }
                    } else {
                        $result["success"] = false;
                        $result["message"] = "Password salah.";
                        $result["user"] = null;
                    }
                } else {
                    $result["success"] = false;
                    $result["message"] = "Email tidak ada.";
                    $result["user"] = null;
                }
            } catch (\Exception $e) {
                $result["success"] = false;
                $result["message"] = "Email atau password salah.";
                $result["user"] = $e->getMessage();
            }
        }
        return response()->json($result);
    }

    public function register(Request $request)
    {
        $value = $request->all();

        try {
            $request->validate([
                'name' => 'string',
                'email' => 'email:rfc,dns|indisposable',
                'phone' => 'min:12',
                'alamat' => 'string',
                'description' => 'string',
            ]);
        } catch (\Exception $e) {
            Log::debug($e->getMessage());

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 422);
        }

        if ($value['role_id'] == 3) {
            $user = new User();
            $user->name = $value['name'];
            $user->email = $value['email'];
            $user->password = Hash::make($value['confirm_password']);
            $user->name = $value['name'];
            $user->role_id = $value['role_id'];
            try {
                if ($request->hasFile('image')) {
                    $request->validate([
                        'image' => 'mimes:jpeg,jpg,png|max:2048',
                    ]);

                    $user->image = $request->file('image');
                }
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Maks. ukuran gambar adalah 2 MB. ' . $e->getMessage(),
                ], 422);
            }

            $generate_random_string = Str::random(40); // Generate random string
            $user->secret_token = "TCF" . $generate_random_string;
            $user->secret_link = 'xraK1W82GFkbA0437Kfm7K86e7uI0h27SBi0N5A7';


            if ($value['confirm_password'] != $value['password']) {
                return response()->json(['success' => false, 'message' => 'Password tidak sama.', 'data' => null]);
            }
            if (strlen($value['password']) < 8) {
                return response()->json(['success' => false, 'message' => 'Password minimal 6 karakter.', 'data' => null]);
            }

            if (!filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
                return response()->json(['success' => false, 'message' => 'Email anda tidak valid.', 'data' => null]);
            }

            if ($user->email) {
                $cek = User::where('email', $user->email)->first();
                if ($cek != null) {
                    return response()->json(['success' => false, 'message' => 'Email telah digunakan.', 'data' => null]);
                }
            }

            $check = Murid::where('phone', $value['phone'])->first();
            if ($check != null) {
                return response()->json(['success' => false, 'message' => 'Telepon telah digunakan.', 'data' => null]);
            }

            if ($user->save()) {
                $muridController = new MuridController();
                $this->sendEmailverify($request);
                return $muridController->store($request, $user, $value);
            } else {
                return response()->json(['success' => false, 'message' => 'Gagal membuat akun.', 'data' => null]);
            }
        } else if ($value['role_id'] == 2) {
            $user = new User();
            $user->name = $value['name'];
            $user->email = $value['email'];
            $user->password = Hash::make($value['confirm_password']);
            $user->name = $value['name'];
            $user->role_id = $value['role_id'];
            try {
                if ($request->hasFile('image')) {
                    $request->validate([
                        'image' => 'mimes:jpeg,jpg,png|max:2048',
                    ]);

                    $user->image = $request->file('image');
                }
            } catch (\Exception $e) {
                return response()->json([
                    'success' => false,
                    'message' => 'Maks. ukuran gambar adalah 2 MB. ' . $e->getMessage(),
                ], 422);
            }

            $generate_random_string = Str::random(40); // Generate random string
            $user->secret_token = "TCF" . $generate_random_string;
            $user->secret_link = 'xraK1W82GFkbA0437Kfm7K86e7uI0h27SBi0N5A7';

            if ($value['confirm_password'] != $value['password']) {
                return response()->json(['success' => false, 'message' => 'Password tidak sama.', 'data' => null]);
            }
            if (strlen($value['password']) < 8) {
                return response()->json(['success' => false, 'message' => 'Password minimal 6 karakter.', 'data' => null]);
            }

            if (!filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
                return response()->json(['success' => false, 'message' => 'Email tidak valid.', 'data' => null]);
            }

            if ($user->email) {
                $cek = User::where('email', $user->email)->first();
                if ($cek != null) {
                    return response()->json(['success' => false, 'message' => 'Email telah digunakan.', 'data' => null]);
                }
            }

            if ($value['phone'] == '') {
                return response()->json(['success' => false, 'message' => 'Telepon tidak boleh kosong.', 'data' => null]);
            }

            $check = Guru::where('phone', $value['phone'])->first();
            if ($check != null) {
                return response()->json(['success' => false, 'message' => 'Telepon telah digunakan.', 'data' => null]);
            }

            $lokasi = Lokasi::find($value['lokasi_id']);
            if (!$lokasi) {
                return response()->json(['success' => false, 'message' => 'Lokasi tidak tersedia.', 'data' => null]);
            }


            $pelajaran = MataPelajaran::find($value['mata_pelajaran_id']);
            if (!$pelajaran) {
                return response()->json(['success' => false, 'message' => 'Mata Pelajaran tidak tersedia.', 'data' => null]);
            } else {
            }

            if ($user->save()) {
                $guruController = new GuruController();
                return $guruController->store($request, $user, $value);
            } else {
                return response()->json(['success' => false, 'message' => 'Gagal membuat akun.', 'data' => null]);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Role tidak ditemukan.', 'data' => null]);
        }
    }

    private function sendEmailverify($request)
    {
        try {
            $user = User::where('email', $request->email)->first();

            $token = Str::random(128);

            DB::table('password_reset_tokens')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            Mail::send('mails.send-email-verify', [
                'name' => $user->name,
                'email' => $request->email,
                'token' => $token
            ], function ($message) use ($request) {
                $message->to($request->email);
                $message->subject('Verifikasi Akun Anda');
            });

            $success = true;
            $message = 'Success';
            $code = 200;
        } catch (\Exception $e) {
            $success = 'danger';
            $message = $e->getMessage();
            $code = 422;
            Log::error($e->getMessage());
        }

        return response()->json([
            $success => false,
            $message => $message,
        ], $code);
    }

    public function submitEmailverify(Request $request)
    {
        DB::table('password_reset_tokens')
            ->where([
                'email' => $request->email,
                'token' => $request->token
            ])
            ->first();

        User::where([
            'email' => $request->email,
        ])->update([
            'email_verified' => 1,
            'email_verified_at' => Carbon::now(),
        ]);

        DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

        return view('success');
    }
}
