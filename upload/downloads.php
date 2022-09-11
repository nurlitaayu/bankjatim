<?php include 'filesLogic.php'; ?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <link rel="stylesheet" href="styleT.css">
  <title>Download files</title>
</head>

<body>

  <table>
    <h1 style="text-align:center;">REPORT PLANNING</h1>
    <thead style="background-color:#ff4040; color:white;">
      <th>No</th>
      <th>Filename</th>
      <!-- <th>size (in mb)</th> -->
      <!-- <th>Downloads</th>
      <th>Action</th> -->
    </thead>
    <tbody>
      <?php foreach ($files as $file) : ?>
        <tr>
          <td><?php echo $file['id']; ?></td>
          <td><?php echo $file['name']; ?></td>
          <!-- <td><?php echo floor($file['size'] / 1000) . ' KB'; ?></td> -->
          <!-- <td><?php echo $file['downloads']; ?></td> -->
          <!-- <td><a href="downloads.php?file_id=<?php echo $file['id'] ?>">Lihat</a></td> -->
        </tr>
      <?php endforeach; ?>

    </tbody>
  </table>

</body>

</html>