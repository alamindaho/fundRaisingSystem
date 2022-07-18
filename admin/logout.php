<?php

	session_start();

	unset($_SESSION['usn']);

	header('location: login.php');

?>