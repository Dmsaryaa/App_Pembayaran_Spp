<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content>
    <meta name="author" content>
    <title>SB Admin 2 - Dashboard</title>
    <link href="<?= base_url() ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-3"></div>
            <div class="col-md-2">
                <img src="<?= base_url() ?>/img/smkn 1 ponorogo.png" alt="" class="mx-s4" height="100" width="100">
            </div>

            <div class="col-md-4">
                <h5>SMKN 1 Ponorogo</h5>
                <h6>Jl Jendral Sudirman No 10</h6>
                <h6>Ponorogo Jawa Timur</h6>
            </div>
            <div class="col-md-3"></div>
        </div>
        <div class="row mt-3">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <br>
                <div class="text-center fw-bold text-uppercase">Bukti Pembayaran</div>
                <br>
                <table>
                    <tr>
                        <td>Nama</td>
                        <td>&nbsp : &nbsp</td>
                        <td>Dimas Arya</td>
                    </tr>
                    <tr>
                        <td>Kelas</td>
                        <td>&nbsp : &nbsp</td>
                        <td>XII RPL 2</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-3"></div>

        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <table class="table table-bordered text-center">
                    <tr>
                        <th>No</th>
                        <th>Jenis Pembayaran</th>
                        <th>Nominal</th>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>SPP</td>
                        <td>100.000</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-3"></div>
        </div>

        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 text-right">
                Petugas
                <br><br><br><br>
                Nama Petugas
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>/js/sb-admin-2.min.js"></script>
    <script>
        window.print();
    </script>
    <?= $this->renderSection('script') ?>
</body>

</html>