<?php include(__DIR__ . '/resources/view/layouts/app.php') ?>

<?php
session_start();
error_reporting(0);


if (strlen($_SESSION['alogin']) == 0) {
	header('location:index.php');
} else {

	if (isset($_POST['submit'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];

		$sql = "UPDATE users SET username=(:name), email=(:email)";
		$query = $dbh->prepare($sql);
		$query->bindParam(':name', $name, PDO::PARAM_STR);
		$query->bindParam(':email', $email, PDO::PARAM_STR);
		$query->execute();
		$msg = "Information Updated Successfully";
	}
?>

    <?php startblock('title') ?>
    Edit Profile
    <?php endblock() ?>

    <?php startblock('content') ?>

    <div class="panel panel-default">
    	<div class="panel-heading">Edit Info</div>
    	<?php if ($error) { ?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>

    	<div class="panel-body">
    		<form method="post" class="form-horizontal" enctype="multipart/form-data">
    			<div class="form-group">
    				<label class="col-sm-2 control-label">Username<span style="color:red">*</span></label>
    				<div class="col-sm-4">
    					<input type="text" name="name" class="form-control" required value="<?php echo htmlentities($result->name); ?>">
    				</div>
    				<label class="col-sm-2 control-label">Email<span style="color:red">*</span></label>
    				<div class="col-sm-4">
    					<input type="email" name="email" class="form-control" required value="<?php echo htmlentities($result->email); ?>">
    				</div>
    			</div>


    			<div class="form-group">
    				<div class="col-sm-8 col-sm-offset-2">
    					<button class="btn btn-primary" name="submit" type="submit">Save Changes</button>
    				</div>
    			</div>

    		</form>
    	</div>
    </div>
    <?php endblock() ?>

<?php } ?>
