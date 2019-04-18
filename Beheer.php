<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'toernooi');
	// initialize variables
    $ID = 0;
	$Omschrijving = "";
	$Datum = "";
    $update = false;
    //select method
	if (isset($_POST['save'])) {
        //save method
		$Omschrijving = $_POST['Omschrijving'];
		$Datum = $_POST['Datum'];
		mysqli_query($db, "INSERT INTO toernooien (Omschrijving, Datum) VALUES ('$Omschrijving', '$Datum')"); 
		$_SESSION['message'] = "Toernooi gegevens opgeslagen"; 
		header('location: Toernooien.php');
    } 
	if (isset($_POST['update'])) {
        //update method
		$ID = $_POST['ID'];
		$Omschrijving = $_POST['Omschrijving'];
		$Datum = $_POST['Datum'];	
	
		mysqli_query($db, "UPDATE toernooien SET Omschrijving='$Omschrijving', Datum='$Datum' WHERE ID=$ID");
		echo $Omschrijving;
		$_SESSION['message'] = "Toernooi gegevens aangepast!"; 
		header('location: Toernooien.php');
	}
	if (isset($_GET['del'])) {
        //delete method
		$ID = $_GET['del'];
		mysqli_query($db, "DELETE FROM toernooien WHERE ID=$ID");
		$_SESSION['message'] = "Toernooi gegevens verwijderd!"; 
		header('location: Toernooien.php');
	}