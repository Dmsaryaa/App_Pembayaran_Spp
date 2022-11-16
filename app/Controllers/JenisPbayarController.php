<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\JenisPembayaran;

class JenisPbayarController extends BaseController
{

    protected $jenispp;

    function __construct()
    {
        $this->jenispp = new JenisPembayaran();
    }

    public function index()
    {
        $data['jenispbayar'] = $this->jenispp->findAll();
        return view('jenispbayar_view', $data);
    }

    public function save()
    {
        $data = array(
            'nama_jenis_pembayaran' => $this->request->getPost('nama_jenis_pembayaran'),
            'nominal' => $this->request->getPost('nominal'),
            'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
        );

        $this->jenispp->insert($data);
        session()->setFlashdata("message", "Data Berhasil Disimpan");
        return $this->response->redirect('/jenispbayar');
    }

    public function edit($id)
    {
        $data = array(
            'nama_jenis_pembayaran' => $this->request->getPost('nama_jenis_pembayaran'),
            'nominal' => $this->request->getPost('nominal'),
            'tahun_ajaran' => $this->request->getPost('tahun_ajaran'),
        );

        $this->jenispp->update($id, $data);
        session()->setFlashdata("message", "Data Berhasil Diubah");
        return $this->response->redirect('/jenispbayar');
    }

    public function delete($id)
    {
        $this->jenispp->delete($id);
        session()->setFlashdata("delete", "Data Berhasil Dihapus");
        return $this->response->redirect('/jenispbayar');
    }
}
