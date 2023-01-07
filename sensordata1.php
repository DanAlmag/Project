<?php 

require 'config.php';

//----------------------------------------------------------------------------

if ($_SERVER["REQUEST_METHOD"] == "GET") {
        //print_r($_POST);
        //echo "<br>PROJECT_API_KEY: ".PROJECT_API_KEY."<br>";
	//MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
	$temperature = escape_data($_GET["temperature"]);
	$humidity = escape_data($_GET["humidity"]);
		
		$sql = "INSERT INTO tbl_temperature(temperature,humidity,created_date) 
			VALUES('".$temperature."','".$humidity."','".date("Y-m-d H:i:s")."')";

		if($db->query($sql) === FALSE)
			{ echo "Error: " . $sql . "<br>" . $db->error; }

		echo "OK. INSERT ID: ";
		echo $db->insert_id;

	//MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM
}
//----------------------------------------------------------------------------
else
{
	header("Refresh: 1;");
	echo "No HTTP POST request found";
}
//----------------------------------------------------------------------------


function escape_data($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}