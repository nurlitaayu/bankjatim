<?php

// DB table to use
$table = <<<EOT
(
    SELECT 
        f.id,
        f.name,
        f.tanggal,
        u.name as user_name
    FROM files f
    LEFT JOIN users u ON f.user_id = u.id
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
    array('db' => 'id', 'dt' => 0),
    array('db' => 'name', 'dt' => 1),
    array('db' => 'tanggal', 'dt' => 2),
    array('db' => 'user_name', 'dt' => 3,),
    array('db' => 'id', 'dt' => 4, 'formatter' => function ($plan, $row) {
        return '
            <div style="display: flex; ">
                <form action="change_plan.php?acc_id='. $plan .'" method="post">
                    <button>Accept</button>
                </form>
                <form action="change.plan.php?reject_id='.$plan.'" method="post">
                    <button>Reject</button>
                </form>
            </div>
        
        ';
    }),
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
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);
