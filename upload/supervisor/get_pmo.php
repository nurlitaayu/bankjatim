<?php

// DB table to use
require_once '../../includes/config.php';
$frequency = $_GET['frequency'] ?: join(',', [1, 2, 3]);

$table = <<<EOT
(
    SELECT 
        f.id,
        f.name AS docname,
        c.name,
        f.tanggal,
        c.frequency_id,
        u.name AS user_name
    FROM 
        files f
    INNER JOIN users u ON f.user_id = u.id
    INNER JOIN categories c ON f.category_id = c.id
    WHERE
        c.work_unit = 2 AND approved = false
) temp
EOT;
// $table = 'files';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array('db' => 'name', 'dt' => 1),
    array('db' => 'docname', 'dt' => 2, 'formatter' => function ($file) {
        return  '<a target="_blank" href="viewpdf.php?path='. HTTP_SERVER .'upload/uploads/planning/' . $file .'">'.$file.'</a>';
    }),
    array('db' => 'tanggal', 'dt' => 3),
    array('db' => 'user_name', 'dt' => 4,),
    array('db' => 'id', 'dt' => 5, 'formatter' => function ($id) {
        return '
            <div style="display: flex; ">
                <form action="' . HTTP_SERVER . 'upload/supervisor/approve_file.php?id=' . $id . '" method="post">
                    <button type="submit">
                        <i class="fa fa-check" style="color:green"></i>
                    </button>
                </form>


                <form action="' . HTTP_SERVER . 'upload/supervisor/delete_file.php?id=' . $id . '" method="post">
                    <button type="submit">
                    <i class="fa fa-trash" style="color:red"></i>
                    </button>
                </form>
            </div>
        ';
    })
);

// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'bankjatim',
    'host' => 'localhost'
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require('../ssp.class.php');

echo json_encode(
    SSP::complex($_GET, $sql_details, $table, $primaryKey, $columns, null, "frequency_id IN ($frequency)")
);
