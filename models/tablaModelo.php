<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'modelo';

// Table's primary key
$primaryKey = 'idModelo';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
	array( 'db' => 'idModelo', 'dt' => 0 ),
	array( 'db' => 'nombre',  'dt' => 1 ),
	array( 'db' => 'apellido',   'dt' => 2 ),
	array( 'db' => 'fechaNacimiento',     'dt' => 3 ),
	array( 'db' => 'direccion',     'dt' => 4 ),
	array( 'db' => 'altura',     'dt' => 5 ),
	array( 'db' => 'peso',     'dt' => 6 ),
	array(
		'db'        => 'fechaRegistro',
		'dt'        => 7,
		'formatter' => function( $d, $row ) {
			return date( 'd-m-Y', strtotime($d));
		}
	)
);

// SQL server connection information
$sql_details = array(
	'user' => 'root',
	'pass' => '',
	'db'   => 'modelbookchile',
	'host' => 'localhost'
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require( '../models/ssp.class.php' );

echo json_encode(
	SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);


