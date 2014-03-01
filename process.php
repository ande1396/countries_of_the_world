<?php

include_once("connection.php");
include("country.php");
// session_start();

class Process
{
	function __construct()
	{
		// echo "erer";
		$country = new Country();
		$country_data = $country->get_info($_POST['this_country']);
		
		//country is set to a new instance of it, calling getinfo, with the post name in the post and select, which is 

		// $_SESSION['data'] = $country_data;
		// var_dump($session['data']);
		// die();
		// header('location: index.php');

		echo json_encode($country_data);
	}

}

$process = new Process();

?> 