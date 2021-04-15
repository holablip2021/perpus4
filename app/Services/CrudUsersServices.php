<?php

namespace App\Services;
use App\Repositories\UsersRepository;
use Validator;
use App\Models\Users;
class CrudUsersServices
{
    protected $listrepo;

    public function __construct(){
        $this->listrepo = new UsersRepository;
    }

   //buat data baru
    public function create($data)
    {
        $pesan = ['status' => false, 'pesan' => ''];
        $validator = Validator::make($data->post(), [
            'reg_nama' => 'required',
            'reg_alamat' => 'required',
            'reg_telp' => 'required',
            'reg_role' => 'required',
            'reg_email' => 'required',
        ]);
        if ($validator->fails()) {
            $pesan['pesan'] = $validator->errors();
            return $pesan;
        }

        try {
            $simpan = new Users;
            $simpan->nama = $data['reg_nama'];
            $simpan->alamat = $data['reg_alamat'];
            $simpan->telepon = $data['reg_telp'];
            $simpan->role_id = $data['reg_role'];
            $simpan->email = $data['reg_email'];
            $simpan->password = $data['reg_password'];
            $simpan->save();
            $pesan['status'] = true;
            $pesan['pesan'] = 'Registrasi berhasil,silahkan login';
            return $pesan;
        } catch (\Exception $e) {
            $pesan['status'] = false;
            $pesan['pesan'] = 'Registrasi ditolak';
            return $pesan;
        }
    }

    //updata data
    public function validasi_user($data)
    {
        $pesan = ['status' => false, 'pesan' => ''];
        $validator = Validator::make($data, [
            'Email' => 'required',
            'Password' => 'required',
        ]);
        if ($validator->fails()) {
            $pesan['pesan'] = $validator->errors();
            return $pesan;
        }

        try {
            $results =  $this->listrepo->getUsers()->where('email', $data['Email'])->where('password', $data['Password'])->first();
            $pesan['status'] = true;
            $pesan['pesan'] = 'Anda telah login';
            session()->put('users', $results->email);
            session()->put('role', $results->role_id);
            session()->put('user_id', $results->id);
            if ($results->role_id == 1) {
                session()->put('main', 'main-admin');
            } else {
                session()->put('main', 'main-member');
            }
            return $pesan;
        } catch (\Exception $e) {
            $pesan['status'] = false;
            $pesan['pesan'] = 'User atau Password salah';
            return $pesan;
        }
    }



}
