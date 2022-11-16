<?= $this->extend('layouts/admin') ?>
<?= $this->Section('title') ?>
Pembayaran
<?= $this->endSection() ?>

<?= $this->Section('content') ?>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="card border-primary">
                <div class="card-header bg-primary">
                    <h1 class="text-light fw-bold">Pembayaran</h1>
                </div>

                <div class="card-body">
                    <form action="/caritagihan" method="post">
                        <div class="form-group">
                            <label for="">No.Rekening</label>
                            <input type="number" name="no_rek" class="form-control" placeholder="Masukkan No.Rekening..." required>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">
                                <div class="fw-bold" style="font-size:18px;">
                                    <i class="fas fa-search">
                                        Cari
                                    </i>
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('script') ?>
<?= $this->endSection() ?>