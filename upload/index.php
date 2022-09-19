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
		<?php include('../includes/leftbar.php'); ?>
		<div class="content-wrapper">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div style="font-size:20pt;" class="panel-heading"><?php echo htmlentities($_SESSION['SESSION_role']); ?></div>
									<form action="index.php" method="post" enctype="multipart/form-data">
										<div class="col-md-4">
											<h4>Kategori</h4>
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
										
											<div class="col-md-8">
											<h3>Year</h3>
												<div>
												<select name="year" style="width:70px;">
												<option value="">Select</option>
												<option value="y1">2017</option>
												<option value="y2">2018</option>
												<option value="y3">2019</option>
												<option value="y4">2010</option>
												<option value="y5">2021</option>
												<option value="y7">2022</option>										
												</select>
												</div>
											</div>

											<div class="col-md-8">
											<h3>Month</h3>
												<div>
												<select name="tmonth" style="width:70px;">
												<option value="">Select</option>
												<option value="tm1">Januari</option>
												<option value="tm2">April</option>
												<option value="tm3">Juli</option>
												<option value="tm4">April</option>
												<option value="tm5">Oktober</option>							
												</select>
												</div>
											</div>
											<h3>Year</h3>
												<div>
												<select name="year" style="width:70px;">
												<option value="">Select</option>
												<option value="y1">2017</option>
												<option value="y2">2018</option>
												<option value="y3">2019</option>
												<option value="y4">2010</option>
												<option value="y5">2021</option>
												<option value="y7">2022</option>										
												</select>
					

											<div class="col-md-8">
											<h3>Month</h3>
												<div>
												<select name="month" style="width:70px;">
												<option value="">Select</option>
												<option value="m1">Januari</option>
												<option value="m2">Februari</option>
												<option value="m3">Maret</option>
												<option value="m4">April</option>
												<option value="m5">Mei</option>
												<option value="m6">Juni</option>		
												<option value="m7">Juli</option>
												<option value="m8">Agustus</option>
												<option value="m9">September</option>
												<option value="m10">Oktober</option>
												<option value="m11">November</option>
												<option value="m12">Desember</option>								
												</select>
												</div>
											</div>
											<h3>Year</h3>
												<div>
												<select name="year" style="width:70px;">
												<option value="">Select</option>
												<option value="y1">2017</option>
												<option value="y2">2018</option>
												<option value="y3">2019</option>
												<option value="y4">2010</option>
												<option value="y5">2021</option>
												<option value="y7">2022</option>										
												</select>

										</div>
										<div class="col-md-8">
											<h3>Upload File Report</h3>
											<div class="form-group">
												<label for="">File UPLOAD</label>
												<input type="hidden" value="<?= $_SESSION['user_id'] ?>" name="user_id">
												<input type="file" name="myfile"></input>
											</div>
											<br>
											<button type="submit" class="btn-danger btn-md" name="save">upload</button>
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
		var categories = <?= json_encode($categories) ?>

		$(document).ready(function() {
			setTimeout(function() {
				$('.succWrap').slideUp("slow");
			}, 3000);


			$("input[name='frequency_id']").change(() => {
				$("#category").empty()
				const id = $("input[name='frequency_id']:checked").val()
				console.log(id)
				filtered = categories.filter(category => category.frequency_id == id)


				filtered.forEach(cat => {
					$("#category").append(`<option value="${cat.id}">${cat.name}</option>`)
				});

			})

		});
	</script>
</body>

</html>