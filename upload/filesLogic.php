<?php
session_start();
// connect to the database
$conn = mysqli_connect('localhost', 'root', '', 'bankjatim');

$sql = "SELECT * FROM categories WHERE work_unit = 1";
$result = mysqli_query($conn, $sql);
$categories = mysqli_fetch_all($result, MYSQLI_ASSOC);



// $user = session_name();

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked
    $unit_kerja = 1;
    $date = date('Y-m-d');
    $user = $_POST['user_id'];
    $categoryId = $_POST['category_id'];
    $year = $_POST['year'];
    $monthId = $_POST['month_id'];


    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];



    $destination = $_SERVER['DOCUMENT_ROOT'] . '/upload/uploads/planning/' . $filename;


    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx', 'xls'])) {
        echo "You file extension must be .zip, .pdf xls. or .docx";
    } elseif ($_FILES['myfile']['size'] > 5000000) { // file shouldn't be larger than 5Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO files (unit_kerja, name, tanggal, user_id, category_id, year, month_id) VALUES ( '$unit_kerja', '$filename', '$date' ,  '$user', '$categoryId', '$year', '$monthId')";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}
