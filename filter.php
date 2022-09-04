<?php
$conn = mysqli_connect('localhost', 'root', '', 'bankjatim');
$sql = "SELECT * FROM files ";
$result = mysqli_query($conn, $sql);

$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
$conn = mysqli_connect('localhost', 'root', '', 'bankjatim');

$sql = "SELECT * FROM files where detail='planning'";
$result = mysqli_query($conn, $sql);
$files = mysqli_fetch_all($result, MYSQLI_ASSOC);
   $conn = mysqli_connect('localhost', 'root', '', 'bankjatim');
    if(ISSET($_POST['filter'])){
        $category=$_POST['category'];
 
        $query=mysqli_query($conn, "SELECT * FROM files WHERE detail='$category'") or die(mysqli_error());
        while($fetch=mysqli_fetch_array($query)){
            echo"<tr><td>".$fetch['detail']."</td><td>".$fetch['name']."</td></tr>";
            
        }
    }else if(ISSET($_POST['reset'])){
        $query=mysqli_query($conn, "SELECT * FROM files") or die(mysqli_error());
        while($fetch=mysqli_fetch_array($query)){
            echo"<tr><td>".$fetch['detail']."</td><td>".$fetch['name']."</td></tr>";
        }
    }else{
        $query=mysqli_query($conn, "SELECT * FROM files") or die(mysqli_error());
        while($fetch=mysqli_fetch_array($query)){
            echo"<tr><td>".$fetch['detail']."</td><td>".$fetch['name']."</td></tr>";
        }
    }
?>
