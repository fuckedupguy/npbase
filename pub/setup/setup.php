<?php

session_start();

$file_exists = file_exists('../../sys/config.php');

if ($file_exists) {

	require_once '../../sys/config.php';
	$test_db_connection = @new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

	if (!$test_db_connection->connect_errno) {

		$head_title = 'Setup - let\'s start install' ;
		include 'header.php';
		include 'ready_to_install_msg.php';
		include 'footer.php';
		exit;

	} elseif ($test_db_connection->connect_errno) {

		$head_title = 'Setup - config file exists alert';
		include 'header.php';
		include 'config_file_exists_msg.php';
		include 'footer.php';
		exit;

	 }

}

function currentScript() {

	if ($_SERVER['QUERY_STRING'] === '') {
		return $current_script = basename($_SERVER['SCRIPT_NAME']);
	} else {
		return $current_script = basename($_SERVER['SCRIPT_NAME'].'?'.$_SERVER['QUERY_STRING']);
	}

}

if (!isset($_GET['step'])) {

	header('Location: setup.php?step=1');
	exit;

}

elseif (isset($_GET['step']) && $_GET['step'] == '1') {

	$head_title = 'Setup - Step 01';
	$_SESSION['current_script'] = currentScript();
	include 'header.php';
	include 'step_1.php';
	include 'footer.php';

}

elseif (isset($_GET['step']) && $_GET['step'] == '2') {

	$head_title = 'Setup - Step 02';
	$_SESSION['current_script'] = currentScript();
	include 'header.php';
	include 'step_2.php';
	include 'footer.php';

}

elseif (isset($_GET['step']) && $_GET['step'] == '3' && !isset($_GET['error'])) {

	$head_title = 'Setup - Step 03';
	$_SESSION['current_script'] = currentScript();
	include 'header.php';
	include 'step_3.php';
	include 'footer.php';

}

else {

	header('Location: '.$_SESSION['current_script']);
	exit;
	
}