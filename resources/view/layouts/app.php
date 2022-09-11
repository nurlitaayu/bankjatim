<?php require_once './ti.php'; ?>

<?php include './config/conn.php' ?>
<!doctype html>


<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="theme-color" content="#3e454c">

    <title>
        Bank Jatim
    </title>


    <!-- Stule -->
    <?php require_once '../layouts/utilities/style.php' ?>

</head>

<body>
    <?php
    $sql = "SELECT * from users;";
    $query = $dbh->prepare($sql);
    $query->execute();
    $result = $query->fetch(PDO::FETCH_OBJ);
    $cnt = 1;
    ?>
    <?php include '../layouts/nav.php' ?>
    <div class="ts-main-content">
        <?php include '../layouts/sidebar.php' ?>
        <div class="content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h3 class="page-title"><?php emptyblock('title') ?></h3>
                        <div class="row">
                            <div class="col-md-12">
                                <?php emptyblock('content') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Scripts -->
    <?php require_once '../layouts/utilities/script.php' ?>
</body>

</html>