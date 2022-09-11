<nav style="background:#ff4040;" class="ts-sidebar">
	<ul class="ts-sidebar-menu">
		<li class="ts-label">Main</li>
		<li><a href="profile.php"><i class="fa fa-user"></i> &nbsp;Profile</a>
		</li>

		</li>
		<li><a href="notification.php"><i class="fa fa-bell"></i> &nbsp;Notification<sup style="color:red">*</sup></a>
		</li>
		<li><a href="messages.php"><i class="fa fa-envelope"></i> &nbsp;Messages</a>
		<li class=" ts-account">
			<a style="background:#c9c8c5; color:black;" href="#"> &nbsp;Unit Kerja</a>

			<?php

			$role =  $_SESSION['SESSION_role'];

			switch ($role) {
				case 'Operator':
			?>

					<ul>
						<li><a href="<?php echo HTTP_SERVER ?>upload/index.php" style="background:#ff4040;">Planning <?php $_SESSION['user_id']; ?></a></li>
						<li><a href="<?php echo HTTP_SERVER ?>upload/pmo.php" style="background:#ff4040;">PMO <?php $_SESSION['user_id']; ?></a></li>
						<li><a href="<?php echo HTTP_SERVER ?>upload/gov.php" style="background:#ff4040;">GOV <?php $_SESSION['user_id']; ?></a></li>
						<li><a href="<?php echo HTTP_SERVER ?>upload/security.php" style="background:#ff4040;">Security <?php $_SESSION['user_id']; ?></a></li>
					</ul>
				<?php
					break;
				case 'Supervisor': ?>
					<ul>
						<li><a href="<?php echo HTTP_SERVER ?>upload/s_planning.php" style="background:#ff4040;">Planningss</a></li>
						<li><a href="<?php echo HTTP_SERVER ?>upload/pmo/s_pmo.php" style="background:#ff4040;">PMOss</a></li>
						<li><a href="<?php echo HTTP_SERVER ?>supervisor/gov.php" style="background:#ff4040;">GOV</a></li>
						<li><a href="<?php echo HTTP_SERVER ?>supervisor/security.php" style="background:#ff4040;">Security</a></li>
					</ul>

				<?php
					break;
				case 'Viewer': ?>

					<ul>
						<li><a href="<?php echo HTTP_SERVER ?>upload/index.php" style="background:#ff4040;">Planning</a></li>
						<li><a href="<?php echo HTTP_SERVER ?>upload/pmo/index.php" style="background:#ff4040;">PMO</a></li>
						<li><a href="<?php echo HTTP_SERVER ?>upload/gov/index.php" style="background:#ff4040;">GOV</a></li>
						<li><a href="<?php echo HTTP_SERVER ?>upload/security/index.php" style="background:#ff4040;">Security</a></li>
					</ul>
			<?php
					break;
				default:
					echo "Role Not Found";
					break;
			}
			?>

		</li>
		</li>
	</ul>
</nav>