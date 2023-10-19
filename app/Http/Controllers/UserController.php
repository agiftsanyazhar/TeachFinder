<?php


namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $User)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $User)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $User)
    {
        //
    }
    public function login(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $result = [];

        // Validasi jika kosong
        if (empty($email) || empty($password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Email & password tidak boleh kosong!',
                'data' => ["email" => $email, "password" => $password]
            ], 401);
        } else {
            try {
                $user = User::where('email', $email)->first();
                // var_dump($user);
                // die;
                if ($user) {
                    if (Hash::check($password, $user->password)) {
                        if ($user->confirm == 0) {
                            $result["success"] = true;
                            $result["message"] = "Akun anda belum aktif,Masukkan Kode OTP Anda terlebih dahulu untuk mengaktifkan";
                            unset($user->password); // remove password from response
                            $result["user"] = $user;
                        } else {
                            $generate_random_string = Str::random(40); // Generate random string
                            $user->secret_token = "TCF" . $generate_random_string;
                            $user->save();

                            $result['success'] = true;
                            $result['message'] = "success login";
                            unset($user->password); // remove password from response
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
}
