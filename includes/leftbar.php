<?php
session_start();
$role =  $_SESSION['SESSION_role'];
?>

<nav style="background:#ff4040;" class="ts-sidebar">
	<ul class="ts-sidebar-menu">
		<li class="ts-label">Main</li>
		<!-- Don't forget to change the url -->
		<li>
			<a href="http://localhost:8000/profile.php"><i class="fa fa-user"></i> &nbsp;Profile</a>
		</li>
		<li>
			<a href="http://localhost:8000/notification.php"><i class="fa fa-bell"></i> &nbsp;Notification<sup style="color:red">*</sup></a>
		</li>

		<li class=" ts-account">
			<a style="background:#c9c8c5; color:black;" href="#"><i class="fa fa-building"></i> &nbsp;Unit Kerja</a>
			<ul>
				<?php if ($role == 'Operator') { ?>

					<li><a href="http://localhost:8000/upload/index.php" style="background:#ff4040;">Planning</a></li>
					<li><a href="http://localhost:8000/upload/pmo/index.php" style="background:#ff4040;">PMO</a></li>
					<li><a href="http://localhost:8000/upload/gov/index.php" style="background:#ff4040;">GOV</a></li>
					<li><a href="http://localhost:8000/upload/security/index.php" style="background:#ff4040;">Security</a></li>

				<?php } elseif ($role == 'Supervisor') { ?>

					<li><a href="http://localhost:8000/upload/s_planning.php" style="background:#ff4040;">Planning</a></li>
					<li><a href="http://localhost:8000/upload/pmo/s_pmo.php" style="background:#ff4040;">PMO</a></li>
					<li><a href="http://localhost:8000/upload/gov/s_gov.php" style="background:#ff4040;">GOV</a></li>
					<li><a href="http://localhost:8000/upload/security/s_security.php" style="background:#ff4040;">Security</a></li>
					
				<?php } elseif ($role == 'Viewer') { ?>

					<li><a href="http://localhost:8000/upload/v_planning.php" style="background:#ff4040;">Planning</a></li>
					<li><a href="http://localhost:8000/upload/pmo/v_pmo.php" style="background:#ff4040;">PMO</a></li>
					<li><a href="http://localhost:8000/upload/gov/v_gov.php" style="background:#ff4040;">GOV</a></li>
					<li><a href="http://localhost:8000/upload/security/v_security.php" style="background:#ff4040;">Security</a></li>
				<?php } ?>
			</ul>
		</li>
	</ul>
</nav>