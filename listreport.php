<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">

    <title>List</title>

    <!-- Font awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- Sandstone Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap Datatables -->
    <link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
    <!-- Bootstrap social button library -->
    <link rel="stylesheet" href="css/bootstrap-social.css">
    <!-- Bootstrap select -->
    <link rel="stylesheet" href="css/bootstrap-select.css">
    <!-- Bootstrap file input -->
    <link rel="stylesheet" href="css/fileinput.min.css">
    <!-- Awesome Bootstrap checkbox -->
    <link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
    <!-- Admin Stye -->
    <link rel="stylesheet" href="css/style.css">

    <script type="text/javascript" src="../vendor/countries.js"></script>
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #dd3d36;
            color: #fff;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }

        .succWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #5cb85c;
            color: #fff;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
            box-shadow: 0 1px 1px 0 rgba(0, 0, 0, .1);
        }
    </style>


</head>

<body>

    <?php include('includev/header.php'); ?>
    <div class="ts-main-content">
        <?php include('includev/leftbar.php'); ?>
        <div class="content-wrapper">
            <div class="container">
                <div class="row" style="margin-top: 10vh;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <?php
                                $arr = [
                                    1 => 'Laporan Tahunan',
                                    2 => 'Laporan Triwulan',
                                    3 => 'Laporan Bulanan'
                                ];
                                ?>
                                <h3 class="font-weight-bold">Kategori</h3>
                                <ul>
                                    <li>
                                        <?php
                                        foreach ($arr as $key => $value) : ?>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck<?= $key ?>">
                                                <label class="form-check-label" for="defaultCheck<?= $key ?>">
                                                    <?= $value ?>
                                                </label>
                                            </div>

                                        <?php
                                        endforeach
                                        ?>
                                    </li>
                                </ul>
                                <hr>
                                <div class="form-group">
                                    <label for="tanggal_p">Tanggal Publish</label>
                                    <input type="date" class="form-control">
                                    <button type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="list-group">
                                    <?php
                                    for ($i = 0; $i < 10; $i++) :  ?>
                                        <a href="#" class="list-group-item list-group-item-action">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">Laporan Dewan Komisaris - Bulan Tahun</h5>
                                                <small>Tanggal</small>
                                            </div>
                                            <small>Laporan Bulanan.</small>
                                        </a>
                                    <?php
                                    endfor
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>

</html>