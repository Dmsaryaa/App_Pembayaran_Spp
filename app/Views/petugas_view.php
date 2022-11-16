<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
Petugas
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="d-sm-flex align-items-center justify-content-between mb-4 mt-3">
        <h1 class="h1 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card border-success">
                <div class="card-header bg-success">
                    <h3 class="fw-bold text-light" style="font-family: 'Kanit', sans-serif; font-size:35px;">PETUGAS
                    </h3>
                    <a href="" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#fpetugas" data-petugas="add"><i class="fas fa-plus"></i>&nbsp Tambah Data</a>
                    <!-- <a href="/fpetugas" class="btn text-light "  style="background:#31E1F7;"><i class="fas fa-user-plus " ></i>&nbsp Tambah Data</a>   -->
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>No Telepon</th>
                                <th>Jabatan</th>
                                <th>Hak Akses</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php
                        $no = 0;
                        foreach ($petugas as $row) {
                            $data = $row['id_petugas'] . "," . $row['nama_petugas'] . "," . $row['username'] . "," . $row['password'] . "," . $row['no_telpon'] . "," . $row['jabatan'] . "," . $row['hak_akses'] . "," . base_url('petugas/edit/' . $row['id_petugas']);
                            # code...
                            $no++;
                        ?>
                            <tr class="text-center">
                                <td><?= $no ?></td>
                                <td><?= $row['nama_petugas'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['no_telpon'] ?></td>
                                <td><?= $row['jabatan'] ?></td>
                                <td><?= $row['hak_akses'] ?></td>
                                <td>
                                    <a href="" class="btn text-light fw-bold bg-warning" data-bs-toggle="modal" data-bs-target="#fpetugas" data-petugas="<?= $data ?>">
                                        Edit</a>
                                    ||
                                    <a href="/petugas/delete/<?= $row['id_petugas'] ?>" onclick="return confirm('Yakin mau hapus data')" class="btn text-light fw-bold" style="background:red;">&nbsp Hapus</a>
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

    <div class="modal fade" id="fpetugas" tabindex="-1" aria-labelledby="#exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Petugas</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" data-bs-dismiss="modal">&times;</span>
                    </button>
                </div>

                <form action="" id="editpetugas" method="post">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="nama_petugas">Nama Petugas</label>
                            <input type="text" name="nama_petugas" id="nama_petugas" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="no_telpon">Nomer Telpon</label>
                            <input type="number" name="no_telpon" id="no_telpon" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="jabatan">Jabatan</label>
                            <input type="text" name="jabatan" id="jabatan" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="hak_akses" class="form-label">Hak Akses</label>

                            <select name="hak_akses" id="hak_akses" class="form-control">
                                <option value="">Pilih Hak Akses</option>
                                <option value="Admin">Admin</option>
                                <option value="Kasir">Kasir</option>
                            </select>
                        </div>

                        <div class="form-group" id="ubah_password">
                            <label for="ubah_password">Ubah Password</label>
                            <input type="checkbox" name="ubah_password" aria-label="Mau Ubah Password" class="form-control">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary fw-bold"> Save
                            Change</button>
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
        $("#fpetugas").on('show.bs.modal', function(event) {
            // alert('asa');
            var button = $(event.relatedTarget);
            var data = button.data('petugas');

            if (data != "add") {
                const barisdata = data.split(",");
                $('#nama_petugas').val(barisdata[1]);
                $('#username').val(barisdata[2]);
                $('#no_telpon').val(barisdata[4]);
                $('#jabatan').val(barisdata[5]);
                $('#hak_akses').val(barisdata[6]).change();
                $('#editpetugas').attr('action', barisdata[7]);
                // alert(barisdata[7]);
                $('#ubah_password').show();
            } else {
                $('#nama_petugas').val('');
                $('#username').val('');
                $('#password').val('');
                $('#no_telpon').val('');
                $('#jabatan').val('');
                $('#hak_akses').val('').change();
                $('#editpetugas').attr('action', 'petugas');
                $('#ubah_password').hide();
            }
        });
    });
</script>

<?= $this->endSection() ?>