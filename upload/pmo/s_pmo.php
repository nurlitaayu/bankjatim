<?php include 'filesLogic.php'; ?>

<?php
$frequency = $_GET['frequency'] ?? [];

?>
<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">

    <title>PMO</title>

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

    <!-- Datatable CSS -->
    <link href='https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'> -->

    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Datatable JS -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/date-1.1.2/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/date-1.1.2/datatables.min.js"></script>

</head>

<body>

    <?php require_once './includes/header.php'; ?>

    <div class="ts-main-content">
        <?php include '../../includes/leftbar.php' ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div style="font-size:20pt;" class="panel-heading"><?php echo htmlentities($_SESSION['SESSION_role']); ?></div>
                                <div class="container">
                                    <h1>Laporan Unit Kerja</h1>
                                    <div class="row" style="margin-top: 20px;">
                                        <div class="col-lg-4">
                                            <form action="" method="get">
                                                <div>
                                                    <!-- Monthly -->
                                                    <input type="checkbox" name="frequency[]" value="3" id="monthly" <?= in_array(3, $frequency) ? "checked" : '' ?>>
                                                    <label for="monthly">Laporan Bulanan</label>
                                                </div>
                                                
                                                <div>
                                                <!-- Quarterly -->
                                                <input type="checkbox" name="frequency[]" value="2" id="quarterly" <?= in_array(2, $frequency) ? 'checked' : '' ?>>
                                                <label for="quarterly">Laporan Triwulan</label>
                                            </div>

                                            <div>
                                                <!-- Yearly -->
                                                <input type="checkbox" name="frequency[]" value="1" id="yearly" <?= in_array(1, $frequency) ? 'checked' : '' ?>>
                                                <label for="yearly">Laporan Tahunan</label>
                                            </div>


                                            <button type="submit">Cari</button>
                                        </form>
                                    </div>

                                    <div class="col-lg-8">
                                        <table class="table table-hover table-border" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Dokumen</th>
                                                    <th>Nama file</th>
                                                    <th>Tanggal</th>
                                                    <th>User Pengupload</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Loading Scripts -->

    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $('.succWrap').slideUp("slow");
            }, 3000);


            var dataTable = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ordering: true, // Set true agar bisa di sorting
                columnDefs: [{
                    "targets": 0,
                    "searchable": false,
                    "orderable": false,
                    "data": null,
                    "title": 'No.',
                    "render": function(data, type, full, meta) {
                        return meta.settings._iDisplayStart + meta.row + 1;
                    }
                }],
                ajax: {
                    url: "../supervisor/get_pmo.php?frequency=<?= join(',', $frequency) ?>",
                    type: "GET"
                }
            });
        });
    </script>
</body>

</html>