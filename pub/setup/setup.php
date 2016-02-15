<?php

if (!isset($_GET['step'])) {

	header('Location: ./');
	exit;

}

elseif (isset($_GET['step']) && $_GET['step'] == '1') {

	include './header.php';
	include './step_1.php';
	include './footer.php';

}

elseif (isset($_GET['step']) && $_GET['step'] == '2') {

	include './header.php';
	include './step_2.php';
	include './footer.php';

}

elseif (isset($_GET['step']) && $_GET['step'] == '3') {

	include './header.php';
	include './step_3.php';
	include './footer.php';

}

else {

	header('Location: ./');
	exit;
	
}