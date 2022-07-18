<?php 

include('include/conn.php');

$nid1 = $_GET['id2'];

if($result = mysqli_query($dbc, "DELETE FROM `users` WHERE id2='$nid1'")) {
		
    $r = mysqli_query($dbc, "ALTER TABLE `users` AUTO_INCREMENT=1");
	
	header('location:index.php?page=members');

}

?>