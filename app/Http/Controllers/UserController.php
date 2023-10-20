<?php

namespace App\Http\Controllers;

use App\Models\{
    User,
    Murid
};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::get();

        return response()->json([
            'data' => $user,
        ], 200);
    }
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $result = [];
        if (empty($email) || empty($password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Email & password tidak boleh kosong!',
                'data' => ["email" => $email, "password" => $password]
            ], 401);
        } else {
            try {
                $user = User::where('email', $email)->first();

                if ($user) {
                    if (Hash::check($password, $user->password)) {
                        if ($user->confirm == 0) {
                            $result["success"] = true;
                            $result["message"] = "Akun anda belum aktif,Masukkan Kode OTP Anda terlebih dahulu untuk mengaktifkan";
                            unset($user->password);
                            $result["user"] = $user;
                        } else {
                            $generate_random_string = Str::random(40); // Generate random string
                            $user->secret_token = "TCF" . $generate_random_string;
                            $user->save();

                            $result['success'] = true;
                            $result['message'] = "success login";
                            unset($user->password);
                            $result["user"] = $user;
                        }
                    } else {
                        $result["success"] = false;
                        $result["message"] = "password salah";
                        $result["user"] = null;
                    }
                } else {
                    $result["success"] = false;
                    $result["message"] = "email tidak ada";
                    $result["user"] = null;
                }
            } catch (\Exception $e) {
                $result["success"] = false;
                $result["message"] = "email atau password salah";
                $result["user"] = $e->getMessage();
            }
        }
        return response()->json($result);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $val = $request->all();

        if ($val['role_id'] == 3) {
            $user = new User();
            $user->name = $val['name'];
            $user->email = $val['email'];
            $user->email_verified = 0;
            $user->password = Hash::make($val['confirm_password']);
            $user->name = $val['name'];
            $user->role_id = $val['role_id'];
            // $user->confirm = 1;
            // $user->pin = $val['pin'];
            if ($request->hasFile('image')) {
                $user->image = $request->file('image');
            }

            // var_dump($request->hasFile('image'));
            // die;

            $generate_random_string = Str::random(40); // Generate random string
            $user->secret_token = "TCF" . $generate_random_string;
            $user->secret_link = 'xraK1W82GFkbA0437Kfm7K86e7uI0h27SBi0N5A7';

            // $user->address = $val['address'];



            if ($val['confirm_password'] != $val['password']) {
                return response()->json(['success' => false, 'message' => 'Password tidak sama', 'data' => null]);
            }
            if (strlen($val['password']) < 6) {
                return response()->json(['success' => false, 'message' => 'Password minimal 6 karakter', 'data' => null]);
            }

            if (!filter_var($user->email, FILTER_VALIDATE_EMAIL)) {
                return response()->json(['success' => false, 'message' => 'email anda tidak valid', 'data' => null]);
            }

            if ($user->email) {
                $cek = User::where('email', $user->email)->first();
                if ($cek != null) {
                    return response()->json(['success' => false, 'message' => 'Email telah digunakan', 'data' => null]);
                }
            }

            if ($user->save()) {

                $murid = new Murid();

                $murid->name = $val['name'];
                $murid->email = $val['email'];

                $murid->phone = ($val['phone']) ?? '';
                if ($murid->phone == '') {
                    return response()->json(['success' => false, 'message' => 'No Telp tidak boleh kosong', 'data' => null]);
                }

                $check = Murid::where('phone', $murid->phone)->first();
                if ($check != null) {
                    return response()->json(['success' => false, 'message' => 'No Telp telah digunakan', 'data' => null]);
                }

                $murid->pin = $val['pin'];
                $murid->jenjang_id = $val['jenjang_id'];
                $murid->alamat = $val['alamat'];

                if ($user->murid()->save($murid)) {
                    return response()->json(
                        [
                            'success' => true,
                            'message' => 'success',
                            'User' => $user,
                            'Murid' => $murid
                        ]
                    );
                } else {
                    return response()->json(['success' => false, 'message' => 'gagal', 'data' => $user->errors()]);
                }
            }



            // $check = User::where('email', $user->email)->first();
            // if ($check) {
            //     return response()->json(['success' => false, 'message' => 'gagal', 'data' => 'Email telah digunakan']);
            // }

            // check email

            // if ($user->save()) {
            //     // regis with OTP
            //     // $otp = new Otp();

            //     // $otp->id_user = $user->id;
            //     // $otp->kode_otp = (string) rand(1000, 9999);
            //     // $otp->created_at = date('Y-m-d H:i:s');
            //     // $otp->is_used = 0;
            //     // $otp->save();
            //     // $text = "
            //     // Hay,\nini adalah kode OTP untuk Login anda.\n
            //     // {$otp->kode_otp}
            //     // \nJangan bagikan kode ini dengan siapapun.
            //     // \nKode akan Kadaluarsa dalam 5 Menit
            //     // ";
            //     // Mail::raw($text, function ($message) use ($user) {
            //     //     $message->to($user->email)
            //     //         ->from('Inisiatorsalam@gmail.com')
            //     //         ->subject('Kode OTP');
            //     // });

            //     unset($user->password);
            //     return response()->json(
            //         [
            //             'success' => true,
            //             'message' => 'success',
            //             'User' => $user,
            //             'Murid' => $murid
            //         ]
            //     );
            // } else {
            //     return response()->json(['success' => false, 'message' => 'gagal', 'data' => $user->errors()]);
            // }
        }
    }
}
