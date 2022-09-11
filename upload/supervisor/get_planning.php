<?php

// DB table to use
// $table = <<<EOT
// (
//     SELECT 
//         f.id,
//         f.name,
//         f.tanggal,
//         u.name as name_user
//     FROM files f
//     LEFT JOIN users u ON f.user_id = u.id
// ) temp
// EOT;
$table = 'files';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array('db' => 'id', 'dt' => 0),
    array('db' => 'name',  'dt' => 1),
    array('db' => 'tanggal',   'dt' => 2),
    array('db' => 'user_id',     'dt' => 3),
);

// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '030101',
    'db'   => 'bankjatim',
    'host' => 'localhost'
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require('../ssp.class.php');

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);
