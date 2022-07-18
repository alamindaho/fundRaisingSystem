<?php 

include('include/conn.php');

$nid1 = $_GET['id'];

if($result = mysqli_query($dbc, "DELETE FROM `add_donation` WHERE id='$nid1'")) {
		
    $r = mysqli_query($dbc, "ALTER TABLE `add_donation` AUTO_INCREMENT=1");
	
	header('location:index.php?page=manageDonation');

}

?>