<?php include 'filesLogic.php'; ?>
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


</head>

<body>

	<?php include('includes/header.php'); ?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php'); ?>
		<div class="content-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-md-offset-3">
						<div class="card" style="margin-top:20vh;">
							<form action="index.php" method="post" enctype="multipart/form-data">
								<h3>Upload File Report</h3>
								<div class="form-group">
									<label for="">Unit Kerja</label>
									<?php
									$arr = [
										1 => 'Planning',
										2 => 'PMO',
										3 => 'GOV',
										4 => 'Security'
									];
									?>
									<select name="unit_kerja" class="" id="">
										<option value="0" selected disabled>Pilih saja</option>
										<?php

										foreach ($arr as $key => $value) : ?>

											<option value="<?php echo $key; ?>"><?php echo $value; ?></option>

										<?php
										endforeach
										?>
									</select>
								</div>
								<div class="form-group">
									<label for="">File UPLOAD</label>
									<input type="file" name="myfile"></input>
								</div>
								<br>
								<button type="submit" class="btn-danger" name="save">upload</button>
								</a>
								<button type="submit" class="btn-success"> <a href="downloads.php" style="color:white;">List Report</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			setTimeout(function() {
				$('.succWrap').slideUp("slow");
			}, 3000);
		});
	</script>
</body>

</html>