<?php

session_start();
include "config.php";


		//The submitted info of the user are valid therefore, grant the user access to the system by creating a valid session for this user and redirect this user to the welcome page
		$_SESSION["VALID_USER_ID"] = "m2.gmail.com";
		header("location: home.php?page_owner=m2.gmail.com");
	?> 