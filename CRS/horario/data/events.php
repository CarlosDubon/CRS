<?php
	require_once('../common/connector/scheduler_connector.php');
	include ('../common/config.php');

	$scheduler = new schedulerConnector($res, $dbtype);
	$scheduler->render_table("horario","idhorario","inicio,fin,espacio_idespacio");
?>