<?php

    	$db_host = "127.0.0.1";
        $db_user = "root";
        $db_pass = "";
        $db_name = "sbb";

// Create connection
        $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

	if(!$conn){
		die("Unable to connect to the database due to the following error --> ".mysqli_connect_error());
	}

?>
