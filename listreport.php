<!DOCTYPE html>
<?php
if (isset($_GET['file_id'])) {
    $id = $_GET['file_id'];

    // fetch file to download from database
    $sql = "SELECT * FROM files WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    $file = mysqli_fetch_assoc($result);
    $filepath = 'uploads/' . $file['name'];

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
    ?>
<html lang="en">
    <head>
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
<body>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
        </div>
    </nav>
    <div class="col-md-3"></div>
    <div class="col-mx-6 well">
        <h3 class="text-center text-danger">List Data Report</h3>
        <hr style="border-top:1px dotted #ccc;"/>
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <form method="POST" action="">
                <div class="form-inline">
                    <label>Category:</label>
                    <select class="form-control" name="category">
                        <option value="planning">Planning</option>
                        <option value="pmo">PMO</option>
                        <option value="gov">Gov</option>
                        <option value="security">Security</option>
                    </select>
                    <button class="btn btn-danger" name="filter">Filter</button>
                    <button class="btn btn-success" name="reset">Reset</button>
                </div>
            </form>
            <br /><br />
            <table class="table table-bordered" style="">
                <thead style="background-color:#ff4040; color:white;">
                    <th>Unit kerja </th>
                    <th>File</th>
                    <th>Download</th>
                </thead>
                <tbody></tbody>
                <thead>
                    <?php include'filter.php'?>
                </thead>
            </table>
        </div>
    </div>
</body>    
</html>
