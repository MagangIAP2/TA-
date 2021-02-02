<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Models\User;
use Hash;
use Session;
use Validator;
use Illuminate\Support\Facades\DB;



class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            if (Auth::user()->role == "admin") {
                return redirect()->to('admin');
            } else {
                return redirect()->to('home');
            }
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $rules = [
            'username'              => 'required',
            'password'              => 'required|string'
        ];

        $messages = [
            'username.required'        => 'username wajib diisi',
            // 'email.email'           => 'Email tidak valid',
            'password.required'     => 'Password wajib diisi',
            'password.string'       => 'Password harus berupa string'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = [
            'username'      => $request->username,
            'password'      => $request->password,
        ];

        // Auth::attempt($data);

        if (Auth::attempt($data)) {
            # code...
            return redirect()->route('dashboard.index');
        } else {
            # code...
            return redirect()->route('auth.login');
        }
    }

    public function showFormRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $rules = [
            // 'nik'           => 'required|min:3|max:35',
            'username'      => 'required|min:3|max:35',
            'nama_lengkap'  => 'required|min:3|max:35',
            'email'         => 'required|min:3|max:35',
            'no_telp'       => 'required|min:3|max:35',
            'password'      => 'required|min:3|max:35',

        ];

        $messages = [
            // 'nik.required'              => 'NIK wajib diisi',
            // 'nik.min'                   => 'NIK minimal 3 karakter',
            // 'nik.max'                   => 'NIK maksimal 35 karakter',
            'username.required'         => 'Username wajib diisi',
            'username.min'              => 'Username minimal 3 karakter',
            'username.max'              => 'Username maksimal 35 karakter',
            'nama_lengkap.required'     => 'Nama Lengkap wajib diisi',
            'nama_lengkap.min'          => 'Nama lengkap minimal 3 karakter',
            'nama_lengkap.max'          => 'Nama lengkap maksimal 35 karakter',
            'no_telp.required'          => 'No Telpon wajib diisi',
            'no_telp.email'             => 'No Telpon tidak valid',
            'no_telp.unique'            => 'No Telpon sudah terdaftar',
            'email.required'            => 'Email wajib diisi',
            'email.email'               => 'Email tidak valid',
            'email.unique'              => 'Email sudah terdaftar',
            'password.required'         => 'Password wajib diisi',
            'password.confirmed'        => 'Password tidak sama dengan konfirmasi password'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = new User;
        $user->nik          = 0;
        $user->username     = ucwords(strtolower($request->username));
        $user->nama_lengkap = ucwords(strtolower($request->nama_lengkap));
        $user->no_telp      = $request->no_telp;
        $user->email        = strtolower($request->email);
        $user->password     = Hash::make($request->password);
        // $user->email_verified_at = \Carbon\Carbon::now();
        $simpan = $user->save();

        if ($simpan) {
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }


    public function registrasi(Request $req)
    {
        // $this->validate([

        // ])

        DB::begintransaction();
        try {
            //code...
            $user = User::create([
                'nik' => 0,
                'username' => $req->username,
                'nama_lengkap' => $req->nama_lengkap,
                'email' => $req->email,
                'no_telp' => $req->no_telp,
                'password' => Hash::make($req->password),
            ]);
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
        DB::commit();
        return redirect()->route('auth.login');
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
}
