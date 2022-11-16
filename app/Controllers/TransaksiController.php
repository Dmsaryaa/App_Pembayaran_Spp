<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Siswa;
use App\Models\JenisPembayaran;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;

class TransaksiController extends BaseController
{
    protected $transaksi, $detail_transaksi, $siswa, $jenispbayar, $db, $session;

    function __construct()
    {
        $this->transaksi = new Transaksi();
        $this->detail_transaksi = new DetailTransaksi();
        $this->siswa = new Siswa();
        $this->jenispbayar = new JenisPembayaran();
        $this->db = \Config\Database::connect();
        $this->session = session();
    }

    public function index()
    {
        return view('pembayaran_view');
    }

    public function cari()
    {
        $bulan = array();
        $trans = array();
        if ($this->request->getVar('no_rek') != null) {
            $no_rek = $this->request->getVar('no_rek');
            $data_siswa = $this->siswa->where('no_rek', $no_rek)->first();
            $sel = $this->db->table('tb_siswa a, tb_jenis_pembayaran b');

            if ($data_siswa != null) {

                $where = "a.tahun_masuk = b.tahun_ajaran and a.id_siswa=" . $data_siswa['id_siswa'];
                $sel->where($where);
                $query = $sel->get();
                foreach ($query->getResult() as $row) {
                    $seltrans = $this->db->table('tb_transaksi a, tb_detail_transaksi b');
                    $wheretrans = "a.id_transaksi = b.id_transaksi and a.id_siswa =" . $row->id_siswa . " and b.id_jenis_pembayaran =" . $row->id_jenis_pembayaran;

                    $seltrans->where($wheretrans);
                    $hasil = $seltrans->countAllResults();

                    if ($hasil > 0) {
                        $seltrans = $this->db->table('tb_transaksi a, tb_detail_transaksi b');
                        $wheretrans = "a.id_transaksi = b.id_transaksi and a.id_siswa ='" . $row->id_siswa . "' and b.id_jenis_pembayaran ='" . $row->id_jenis_pembayaran . "'";

                        $seltrans->where($wheretrans);
                        $hTrans = $seltrans->get();

                        foreach ($hTrans->getResult() as $row1) {
                            #code...
                            if ($row->id_jenis_pembayaran == $row1->id_jenis_pembayaran) {
                                $trans[$row->nama_jenis_pembayaran] = $row1->id_transaksi;
                            }
                        }

                        $bulan[$row->nama_jenis_pembayaran] = 0;
                    } else {
                        $bulan[$row->nama_jenis_pembayaran] = $row->id_jenis_pembayaran;
                    }
                }
            } else {
                $id_transaksi = "";
            }
            $data['trans'] = $trans;
            $data['spp'] = $bulan;
            $data['siswa'] = $data_siswa;

            return view('cari_view', $data);
        } else {
            return view('pembayaran_view');
        }
    }



    public function bayar($bln, $id, $id_jenis_bayar)
    {
        $tanggal = Date("Y-m-d");
        // dd($tanggal);
        $idtrans = $this->transaksi->insert([
            "id_siswa" => $id,
            "id_petugas" => $this->session->get('id_petugas'),
            "tanggal_bayar" => $tanggal,
        ]);

        $siswas = $this->siswa->find($id);
        $this->detail_transaksi->insert([
            "id_transaksi" => $idtrans,
            "bulan_bayar" => $bln,
            "id_jenis_pembayaran" => $id_jenis_bayar,
        ]);

        echo "<script>window.open('http://localhost:8080/bill','_blank')</script>";

        return redirect()->to("/caritagihan?no_rek=" . $siswas['no_rek']);
    }

    public function bill($id)
    {
        $seltrans = $this->db->table('tb_transaksi a, tb_detail_transaksi b, tb_siswa c,tb_petugas d');
        $wheretrans = "a.id_transaksi = b.id_transaksi and a.id_siswa = c.id_siswa and d.id_petugas = a.id_petugas and a.id_transaksi = '$id'";

        $seltrans->where($wheretrans);
        $q = $seltrans->get();

        foreach ($q->getResult() as $row) {
            #code...
            $kelas = $row->kelas;
            $nama_siswa = $row->nama_siswa;
            $petugas = $row->nama_petugas;
        }

        $data['kelas'] = $kelas;
        $data['nama_siswa'] = $nama_siswa;
        $data['petugas'] = $petugas;
        return view('bill', $data);
    }
}
