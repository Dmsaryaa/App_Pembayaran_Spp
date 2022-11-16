<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>
Jenis Pembayaran
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
                    <h3 class="fw-bold text-light" style="font-family: 'Kanit', sans-serif; font-size:35px;">JENIS PEMBAYARAN</h3>
                    <a href="" class="btn btn-primary" data-toggle="modal" data-target="#feditJenispbayar" data-jenispbayar="add"><i class="fas fa-plus"></i>&nbsp Tambah Data</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead class="text-center">
                            <tr>
                                <th>No</th>
                                <th>Nama Jenis Pembayaran</th>
                                <th>Nominal</th>
                                <th>Tahun Ajaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <?php
                        $no = 0;
                        foreach ($jenispbayar as $row) {
                            $data = $row['id_jenis_pembayaran'] . "," . $row['nama_jenis_pembayaran'] . "," . $row['nominal'] . "," . $row['tahun_ajaran'] . "," . base_url('jenispb/edit/' . $row['id_jenis_pembayaran']);
                            # code...
                            $no++;
                        ?>
                            <tr class="text-center">
                                <td><?= $no ?></td>
                                <td><?= $row['nama_jenis_pembayaran'] ?></td>
                                <td><?= $row['nominal'] ?></td>
                                <td><?= $row['tahun_ajaran'] ?></td>
                                <td>
                                    <a href="" class="btn text-light fw-bold bg-warning" data-toggle="modal" data-target="#feditJenispbayar" data-jenispbayar="<?= $data ?>"> Edit</a>
                                    ||
                                    <a href="/jenispb/delete/<?= $row['id_jenis_pembayaran'] ?>" onclick="return confirm('Yakin mau hapus data')" class="btn text-light fw-bold" style="background:red;">&nbsp Hapus</a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>
                </div>
            </div>
        </div>



        <div class="modal fade" id="feditJenispbayar" tabindex="-1" aria-labelledby="#exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Input Data Petugas</h5>
                        <button type="button" class="close" aria-label="Close">
                            <span aria-hidden="true" data-bs-dismiss="modal">&times;</span>
                        </button>
                    </div>

                    <form action="" id="editJenispbayar" method="post">
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama_jenis_pembayaran">Nama Jenis Pembayaran</label>
                                <input type="text" name="nama_jenis_pembayaran" id="nama_jenis_pembayaran" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="nominal">Nominal</label>
                                <input type="number" name="nominal" id="nominal" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>

                                <select name="tahun_ajaran" id="tahun_ajaran" class="form-control">
                                    <option value="">Pilih Tahun Ajaran</option>
                                    <option value="2020/2021">2020/2021</option>
                                    <option value="2021/2022">2021/2022</option>
                                    <option value="2022/2023">2022/2023</option>
                                </select>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary fw-bold"> Save Change</button>
                                <button type="button" class="btn btn-secondary fw-bold" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </form>
                </div>
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
        $("#feditJenispbayar").on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var data = button.data('jenispbayar');
            if (data != "")

            {
                const barisdata = data.split(",");
                $('#nama_jenis_pembayaran').val(barisdata[1]);
                $('#nominal').val(barisdata[2]);
                $('#tahun_ajaran').val(barisdata[3]);
                $('#editJenispbayar').attr('action', barisdata[4]);
            } else {
                $('#nama_jenis_pembayaran').val();
                $('#nominal').val();
                $('#tahun_ajaran').val();
                $('#editJenispbayar').attr('action', "jenispbayar");
            }
        });
    });
</script>

<?= $this->endSection() ?>