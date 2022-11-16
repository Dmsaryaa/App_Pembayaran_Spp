<?php

namespace App\Controllers;

use App\Models\Petugas;

class LoginController extends BaseController
{
    public function index()
    {
        return view('login_view');
    }
    public function login()
    {
        $petugass = new Petugas();
        $username = $this->request->getpost('username');
        $password = $this->request->getpost('password');
        $dataPetugas = $petugass->where(['username' => $username])->first();
        if ($dataPetugas) {
            if (password_verify($password, $dataPetugas['password'])) {
                session()->set(
                    [
                        'id_petugas' => $dataPetugas['id_petugas'],
                        'nama_petugas' => $dataPetugas['nama_petugas'],
                        'log_in' => true,
                        'hak_akses' => $dataPetugas['hak_akses'],
                    ]
                );
                return redirect('/');
            } else {
                session()->setFlashdata('error', 'username password salah');
                return $this->response->redirect('/login');
            }
        } else {
            session()->setflashdata('error', 'username tidak ditemukan');
            return $this->response->redirect('/login');
        }
    }
    public function logout()
    {
        session()->destroy();
        return $this->response->redirect('/login');
    }
}
