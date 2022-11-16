<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
Siswa
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <h1 class="h1 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card border-success">
                <div class="card-header bg-success">
                    <h3 class="fw-bold text-light" style="font-family: 'Kanit', sans-serif; font-size:35px;">SISWA</h3>
                    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#feditSiswa" data-siswa="add"><i class="fas fa-plus"></i>&nbsp Tambah Data</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nis</th>
                                <th>Kelas</th>
                                <th>Tahun Masuk</th>
                                <th>No.Rekening</th>
                                <th>Jenis Kelamin</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php
                        $no = 0;
                        foreach ($siswa as $row) {
                            $data = $row['id_siswa'] . "," . $row['nama_siswa'] . "," . $row['nis'] . "," . $row['kelas'] . "," . $row['tahun_masuk'] . "," . $row['no_rek'] . "," . $row['jk'] . "," . base_url('siswa/edit/' . $row['id_siswa']);
                            # code...
                            $no++;
                        ?>
                            <tr class="text-center">
                                <td><?= $no ?></td>
                                <td><?= $row['nama_siswa'] ?></td>
                                <td><?= $row['nis'] ?></td>
                                <td><?= $row['kelas'] ?></td>
                                <td><?= $row['tahun_masuk'] ?></td>
                                <td><?= $row['no_rek'] ?></td>
                                <td><?= $row['jk'] ?></td>
                                <td>
                                    <a href="" class="btn text-light fw-bold bg-warning" data-bs-toggle="modal" data-bs-target="#feditSiswa" data-siswa="<?= $data ?>">Edit</a>
                                    ||
                                    <a href="/siswa/delete/<?= $row['id_siswa'] ?>" onclick="return confirm('Yakin mau hapus data')" class="btn text-light fw-bold" style="background:red;">&nbsp Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>


    </div>

    <div class="modal fade" id="feditSiswa" tabindex="-1" aria-labelledby="#exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Input Data Siswa</h5>
                    <button type="button" class="close" aria-label="Close">
                        <span aria-hidden="true" data-bs-dismiss="modal">&times;</span>
                    </button>
                </div>

                <form action="" id="editsiswa" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" name="nama_siswa" id="nama_siswa" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="nis">Nis</label>
                            <input type="text" name="nis" id="nis" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="kelas">Kelas</label>
                            <input type="text" name="kelas" id="kelas" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="tahun_masuk" class="form-label">Tahun Masuk</label>

                            <select name="tahun_masuk" id="tahun_masuk" class="form-control">
                                <option value="">Pilih Tahun Ajaran</option>
                                <option value="2020/2021">2020/2021</option>
                                <option value="2021/2022">2021/2022</option>
                                <option value="2022/2023">2022/2023</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="no_rek">No.Rekening</label>
                            <input type="number" name="no_rek" id="no_rek" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="jk" class="form-label">Jenis Kelamin</label>

                            <select name="jk" id="jk" class="form-control">
                                <option value="">Jenis Kelamin</option>
                                <option value="Perempuan">Perempuan</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                            </select>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary fw-bold"> Save Change</button>
                        <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <?php if (!empty(session()->getFlashdata("message"))) : ?>
        <div class="alert alert-success text-center text-uppercase">
            <?= session()->getFlashdata("message") ?>
        </div>
    <?php endif ?>

    <?php if (!empty(session()->getFlashdata("delete"))) : ?>
        <div class="alert alert-danger text-center text-uppercase">
            <?= session()->getFlashdata("delete") ?>
        </div>
    <?php endif ?>
</div>

<?= $this->endSection() ?>

<?= $this->section('script') ?>

<script>
    $(document).ready(function() {
        // alert('asa');
        $("#feditSiswa").on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var data = button.data('siswa');
            if (data != "")

            {
                const barisdata = data.split(",");
                $('#nama_siswa').val(barisdata[1]);
                $('#nis').val(barisdata[2]);
                $('#kelas').val(barisdata[3]);
                $('#tahun_masuk').val(barisdata[4]);
                $('no_rek').val(barisdata[5]);
                $('#jk').val(barisdata[6]).change();
                $('#editsiswa').attr('action', barisdata[7]);
            } else {
                $('#nama_siswa').val();
                $('#nis').val();
                $('#kelas').val();
                $('#tahun_masuk').val();
                $('#no_rek').val();
                $('#jk').val().change();
                $('#editsiswa').attr('action', "siswa");
            }
        });
    });
</script>

<?= $this->endSection() ?>