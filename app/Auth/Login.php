<?php
session_start();

include $_SERVER['DOCUMENT_ROOT'] . 'config/conn.php';

if (isset($_POST['login'])) {

    $email = $_POST['username'];
    $password = md5($_POST['password']);

    $cek_email = "SELECT email, password, role, baned, status, logintime FROM users WHERE email=:username";
    $stmt = $dbh->prepare($cek_email);
    $stmt->execute(array(':username' => $email));
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($stmt->rowCount() == 1) {
        if ($row['password'] !== $password) {
            if ($row['logintime'] >= 3 || $row['baned'] == "y") {
                // Cek jumlah kesalahan login berulang
                $failed_attempt = $row['logintime'] + 1;
                $qry_banned = "UPDATE users SET baned = 'y', logintime = $failed_attempt where email='$email'";
                $exec_banned = $dbh->prepare($qry_banned);
                $exec_banned->execute();

                echo '<script language="javascript">';
                echo 'alert("Akun anda telah terblokir. Silahkan hubungi administrator!")';
                echo '</script>';
            } else {
                // Hitung kesalahan login secara berulang sebnyak 3x
                $failed_attempt = $row['logintime'] + 1;
                $query_attempt = "UPDATE users SET logintime = $failed_attempt where email='$email'";
                $exec_attempt = $dbh->prepare($query_attempt);
                $exec_attempt->execute();

                echo '<script language="javascript">';
                echo 'alert("Password Salah !")';
                echo '</script>';
            }
        } else {
            if ($row['status'] == 0) {
                // Cek status aktif akun
                echo '<script language="javascript">';
                echo 'alert("Akun anda tidak diketahui atau di nonaktifkan! Silahkan menghubungi administrator")';
                echo '</script>';
            } else {
                // reset attempt login user menjadi 0, jika sebelumnya user salah password
                $qry_update = "UPDATE users SET logintime = 0 where email='$email'";
                $exec_update = $dbh->prepare($qry_update);
                $exec_update->execute();

                $_SESSION['SESSION_role'] = $row['role'];
                if ($_SESSION['SESSION_role'] == "Administrator") {
                    $_SESSION['alogin'] = $_POST['username'];
                    header('location: admin/profile.php');
                } else if ($_SESSION['SESSION_role'] == "Supervisor") {
                    $_SESSION['alogin'] = $_POST['username'];
                    header('location: profile.php');
                } else if ($_SESSION['SESSION_role'] == "Viewer") {
                    $_SESSION['alogin'] = $_POST['username'];
                    header('location: Viewer.php');
                } else if ($_SESSION['SESSION_role'] == "operator") {
                    $_SESSION['alogin'] = $_POST['username'];
                    header('location: operator.php');
                } else {
                    echo '<script language="javascript">';
                    echo 'alert("Role tidak dikenali!")';
                    echo '</script>';
                }
            }
        }
    } else {
        echo '<script language="javascript">';
        echo 'alert("Akun tidak terdaftar. Silahkan register terlebih dahulu")';
        echo '</script>';
    }
}
