<?php
require '../vendor/autoload.php';

use Coderatio\SimpleBackup\SimpleBackup;

include('includes/config.php');

if ($_POST && $_FILES) {

	if (move_uploaded_file($_FILES['datafile']['tmp_name'], './sqlfiles/' . $_FILES['datafile']['name'])) {
		$sql = file_get_contents('./sqlfiles/' . $_FILES['datafile']['name']);
		
		$dbh->query('SET FOREIGN_KEY_CHECKS = 0')->execute();
		$dbh->query('DROP TABLE IF EXISTS `categories`, `deleteduser`, `feedback`, `files`, `frequencies`, `months`, `notification`, `users`')->execute();
		$dbh->query('SET FOREIGN_KEY_CHECKS = 1')->execute();

		$simpleBackup = SimpleBackup::setDatabase(['bankjatim', 'root', '', 'localhost'])
			->importFrom($sql);

		var_dump($simpleBackup->getResponse());
		unlink('./sqlfiles/' . $_FILES['datafile']['name']);
	}
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

	<title>Restore Data</title>

	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">
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
	<?php include('includes/header.php'); ?>
	<div class="ts-main-content">
		<?php include('includes/leftbar.php'); ?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<h3 class="page-title">Restore Data</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Restore Data</div>
									<div class="panel-body">
										<form enctype="multipart/form-data" method="post" class="form-horizontal">
											<div class="form-group">
												<label class="col-sm-3 control-label">File Data</label>
												<div class="col-sm-7">
													<input type="file" name="datafile" />
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-offset-3 col-sm-7">
													<button type="submit" name="restore" class="btn btn-danger">Restore Data</button>
												</div>
											</div>
										</form>
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

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap-select.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/dataTables.bootstrap.min.js"></script>
<script src="js/Chart.min.js"></script>
<script src="js/fileinput.js"></script>
<script src="js/chartData.js"></script>
<script src="js/main.js"></script>

</html>