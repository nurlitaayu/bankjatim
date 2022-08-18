<?php
session_start();
include('includes/config.php');
if(isset($_POST['login'])){

	$email=$_POST['username'];
	$password=md5($_POST['password']);
	$sql ="SELECT email,Password,role FROM users WHERE email=:username and Password=:password";
    $stmt = $dbh ->prepare($sql);    
    $stmt->execute(array(':username' => $email, ':password' => 
    $password));
    $stmt->execute();       
    $row = $stmt->fetch(PDO::FETCH_ASSOC);   
    if($stmt->rowCount() == 1){     
        //$row = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION['SESSION_role'] = $row['role'];
            if( $_SESSION['SESSION_role'] == "Administrator"){
				$_SESSION['alogin']=$_POST['username'];
				// $_SESSION['SESSION_role'];
                header('location: admin/profile.php');
        } else if($_SESSION['SESSION_role'] == "Supervisor") {
			$_SESSION['alogin']=$_POST['username'];
                header('location: profile.php');
        }else if($_SESSION['SESSION_role'] == "Viewer") {
			$_SESSION['alogin']=$_POST['username'];
                header('location: Viewer.php');
		}else if($_SESSION['SESSION_role'] == "operator") {
			$_SESSION['alogin']=$_POST['username'];
                header('location: Operator.php');
		}
    } else {
        echo "<script>alert('Username atau password anda salah');</script>";
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

	
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<link rel="stylesheet" href="css/fileinput.min.css">
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="css/style.css">

</head>

<body>
	<div class="login-page bk-img">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 class="text-center text-bold mt-4x">Login</h1>
						<div class="well row pt-2x pb-3x bk-light">
							<div class="col-md-8 col-md-offset-2">
								<form method="post">

									<label for="" class="text-uppercase text-sm">Your Email</label>
									<input type="text" placeholder="email..." name="username" class="form-control mb" required>

									<label for="" class="text-uppercase text-sm">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb" required>
									<button class="btn btn-danger btn-block" name="login" type="submit">LOGIN</button>
								</form>
								<br>
								<p>Belum punya akun? <a href="register.php" >Signup</a></p>
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

</body>

</html>