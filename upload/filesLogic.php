<?php
session_start();
// connect to the database
$conn = mysqli_connect('localhost', 'root', '030101', 'bankjatim');

// $sql = "SELECT * FROM files where unit_kerja='planning'";
// $result = mysqli_query($conn, $sql);

// $files = mysqli_fetch_all($result, MYSQLI_ASSOC);


// $user = session_name();

// Uploads files
if (isset($_POST['save'])) { // if save button on the form is clicked


    $unit_kerja = $_POST['unit_kerja'];
    $date = date('Y-m-d');
    // $user = $_SESSION['id'];


    // name of the uploaded file
    $filename = $_FILES['myfile']['name'];


    switch ($unit_kerja) {
        case 1:
            // destination of the file on the server
            $destination = 'uploads/planning/' . $filename;
            break;
        case 2:
            // destination of the file on the server
            $destination = 'uploads/pmo/' . $filename;
            break;
        case 3:
            // destination of the file on the server
            $destination = 'uploads/gov/' . $filename;
            break;
        case 4:
            // destination of the file on the server
            $destination = 'uploads/security/' . $filename;
            break;
        default:
            echo "Tidak ada tempat penyimpanan";
            break;
    }


    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];

    if (!in_array($extension, ['zip', 'pdf', 'docx', 'xls'])) {
        echo "You file extension must be .zip, .pdf xls. or .docx";
    } elseif ($_FILES['myfile']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        echo "File too large!";
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO files (unit_kerja, name, tanggal, user_id) VALUES ( '$unit_kerja', '$filename', '$date' ,  NULL)";
            if (mysqli_query($conn, $sql)) {
                echo "File uploaded successfully";
            }
        } else {
            echo "Failed to upload file.";
        }
    }
}

// Downloads files
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/planning/' . $file['name'];

    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($filepath));
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize('uploads/' . $file['name']));

        //This part of code prevents files from being corrupted after download
        ob_clean();
        flush();

        readfile('uploads/' . $file['name']);

        // Now update downloads count
        $newCount = $file['downloads'] + 1;
        $updateQuery = "UPDATE files SET downloads=$newCount WHERE id=$id";
        mysqli_query($conn, $updateQuery);
        exit;
    }
}
