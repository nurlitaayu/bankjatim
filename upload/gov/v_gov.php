<?php
require_once '../includes/config.php';
session_start();


// Fetch categories
$cQuery = "SELECT * FROM categories WHERE work_unit = 3";
$result = $dbh->query($cQuery);
$categories = $result->fetchAll(PDO::FETCH_ASSOC);
// ----------

$categoryId = $_GET['category_id'] ?? '';
$files = null;


$query = "SELECT c.name, f.tanggal, fr.name AS frequency, f.name AS doc_path 
FROM files f  
INNER JOIN categories c 
ON f.category_id = c.id
INNER JOIN frequencies fr
ON c.frequency_id = fr.id
WHERE f.approved = true";

if ($categoryId) {
    $query = $query .= " AND c.id = ?";
    $stmt = $dbh->prepare($query);
    $stmt->execute([$categoryId]);
    $files = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

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

    <?php include('./includes/header.php'); ?> -->
    <div class="ts-main-content">
        <?php include('../includes/leftbar.php'); ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div style="font-size:20pt;" class="panel-heading"><?php echo htmlentities($_SESSION['SESSION_role']); ?></div>
                            <div class="row">
                                <div class="col-md-4">
                                    <h3 class="font-weight-bold">Kategori</h3>
                                    <form action="" method="get">
                                        <div>
                                            <input type="radio" name="frequency_id" value="1" id="yearly">
                                            <label for="yearly">Laporan Tahunan</label>
                                        </div>

                                        <div>
                                            <input type="radio" name="frequency_id" value="2" id="quarterly">
                                            <label for="quarterly">Laporan Triwulan</label>
                                        </div>

                                        <div>
                                            <input type="radio" name="frequency_id" value="3" id="monthly">
                                            <label for="monthly">Laporan Bulanan</label>
                                        </div>

                                        <h4>Nama Dokumen</h4>
                                        <select name="category_id" id="category" style="width:200px;">
                                        </select>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Cari</button>
                                        </div>
                                    </form>

                                </div>
                                <div class="col-md-8">
                                    <div class="list-group">
                                        <?php foreach ($files as $key => $file) { ?>
                                            <a target="_blank" href="viewpdf.php?path=<?= HTTP_SERVER . 'upload/uploads/planning/' . $file['doc_path'] ?>" class="list-group-item list-group-item-action">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1"><?= $file['name'] ?> - <?= $file['tanggal'] ?></h5>
                                                    <small><?= $file['tanggal'] ?></small>
                                                </div>
                                                <small><?= $file['frequency'] ?></small>
                                            </a>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</body>

<script src="./js/jquery.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
    var categories = <?= json_encode($categories) ?>

    $(document).ready(function() {

        $("input[name='frequency_id']").change(() => {
            $("#category").empty()
            const id = $("input[name='frequency_id']:checked").val()
            filtered = categories.filter(category => category.frequency_id == id)


            filtered.forEach(cat => {
                $("#category").append(`<option value="${cat.id}">${cat.name}</option>`)
            });

        })

    });
</script>


</html>