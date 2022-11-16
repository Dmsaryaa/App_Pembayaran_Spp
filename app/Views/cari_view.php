<?= $this->extend('layouts/admin') ?>
<?= $this->Section('title') ?>
Total Tagihan
<?= $this->endSection() ?>

<?= $this->Section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card border-primary">
                <div class="card-body">
                    <?php
                    if ($siswa != null) {

                    ?>
                        Nama Siswa : <?= $siswa['nama_siswa'] ?>
                        <br>
                        Kelas &nbsp : <?= $siswa['kelas'] ?>

                        <table class="table table-striped table-bordered text-center">
                            <tr>
                                <th>No</th>
                                <th>Bulan</th>
                                <th>Bulan</th>
                                <th>Status</th>
                            </tr>
                            <?php
                            $no = 0;
                            if (($spp != null) && ($siswa != null)) {
                                foreach ($spp as $id => $val) {
                                    $no++;
                            ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $id ?></td>
                                        <td><?= $val == 0 ? "<p class='text-success'>Lunas</p> | <a href='/bill/$trans[$id]' class='btn btn-warning'>Cetak</a>" : "<a href='/bayar/$id/$siswa[id_siswa]/$val' class='btn btn-danger'>Bayar</a>" ?></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="3" class="text-uppercase">Tidak Ada Data</td>
                                </tr>
                            <?php
                            }

                            ?>
                        </table>
                    <?php
                    } else {
                        echo "Data Siswa Tidak Ditemukan";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->Section('script') ?>
<?= $this->endSection() ?>