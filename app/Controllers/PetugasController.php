<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Petugas;

class PetugasController extends BaseController
{

    protected $petugass;

    function __construct()
    {
        $this->petugass = new Petugas();
    }

    public function index()
    {
        $data['petugas'] = $this->petugass->findAll();
        return view('petugas_view', $data);
    }

    public function save()
    {

        $data = array(
            'nama_petugas' => $this->request->getPost('nama_petugas'),
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'no_telpon' => $this->request->getPost('no_telpon'),
            'jabatan' => $this->request->getPost('jabatan'),
            'hak_akses' => $this->request->getPost('hak_akses'),
        );

        $this->petugass->insert($data);
        session()->setFlashdata("message", "Data Berhasil Disimpan !");
        return $this->response->redirect('/petugas');
    }

    public function edit($id)
    {

        // dd($this->request->getPost('ubah_password'));

        if ($this->request->getPost('ubah_password') == null) {

            $data = array(
                'nama_petugas' => $this->request->getPost('nama_petugas'),
                'username' => $this->request->getPost('username'),
                'no_telpon' => $this->request->getPost('no_telpon'),
                'jabatan' => $this->request->getPost('jabatan'),
                'hak_akses' => $this->request->getPost('hak_akses'),
            );
            $this->petugass->update($id, $data);
        } else {

            $data = array(
                'nama_petugas' => $this->request->getPost('nama_petugas'),
                'username' => $this->request->getPost('username'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
                'no_telpon' => $this->request->getPost('no_telpon'),
                'jabatan' => $this->request->getPost('jabatan'),
                'hak_akses' => $this->request->getPost('hak_akses'),
            );
            $this->petugass->update($id, $data);
        }
        session()->setFlashdata("message", "Data Berhasil Diubah !");
        return $this->response->redirect('/petugas');
    }

    public function delete($id)
    {
        $this->petugass->delete($id);
        session()->setFlashdata("delete", "Data Berhasil Dihapus !");
        return $this->response->redirect('/petugas');
    }
}
