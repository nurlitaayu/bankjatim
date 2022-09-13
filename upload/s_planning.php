<?php include 'filesLogic.php'; ?>

<?php 
$category = $_GET['category'] ?: [];

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

    <title>Planning</title>

    <?php include('css/styles.php') ?>

    <!-- Datatable CSS -->
    <!-- <link href='https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'> -->

    <!-- jQuery Library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Datatable JS -->
    <!-- <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script> -->

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.12.1/date-1.1.2/datatables.min.css" />

    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.12.1/date-1.1.2/datatables.min.js"></script>

</head>

<body>

    <?php require_once './includes/header.php'; ?>

    <div class="ts-main-content">
        <?php require_once './includes/leftbar.php' ?>
        <div class="content-wrapper">
            <div class="container">
                <h1>Laporan Unit Kerja</h1>
                <div class="row" style="margin-top: 40px;">
                    <div class="col-lg-4">
                        <form action="" method="get">
                                                        <div>
                                <!-- Planning -->
                                <input type="checkbox" name="category[]" value="1" id="planning" <?php echo in_array(1, $category) == true ? "checked" : '' ?> >
                                <label for="planning">Planning</label>
                            </div>

                            <div>
                                <!-- Pmo -->
                                <input type="checkbox" name="category[]" value="2" id="pmo" <?= in_array(2, $category) ? 'checked' : '' ?>>
                                <label for="pmo">PMO</label>
                            </div>

                            <div>
                                <!-- Gov -->
                                <input type="checkbox" name="category[]" value="3" id="gov" <?= in_array(3, $category) ? 'checked' : '' ?>>
                                <label for="gov">Gov</label>
                            </div>

                            <div>
                                <!-- Security -->
                                <input type="checkbox" name="category[]" value="4" id="security" <?= in_array(4, $category) ? 'checked' : '' ?>>
                                <label for="security">Security</label>
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
                ajax: {
                    url: "supervisor/get_planning.php?category=<?= join(',', $category) ?>",
                    type: "GET"
                }
            });
        });
    </script>
</body>

</html>