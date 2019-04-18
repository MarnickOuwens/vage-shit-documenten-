<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'toernooi');
	// initialize variables
    $ID = 0;
	$ToernooiID = "";
    $Ronde = "";
    $Speler1ID = "";
    $Speler2ID = "";
    $Score1 = "";
    $Score2 = "";
    $WinnaarID = "";
    $update = false;
    //select method
	if (isset($_POST['save'])) {
        //save method
		$ToernooiID = $_POST['ToernooiID'];
        $Ronde = $_POST['Ronde'];
        $Speler1ID = $_POST['Speler1ID'];
        $Speler2ID = $_POST['Speler2ID'];
        $Score1 = $_POST['Score1'];
        $Score2 = $_POST['Score2'];
        $WinnaarID = $_POST['WinnaarID'];
		mysqli_query($db, "INSERT INTO wedstrijd (ToernooiID, Ronde, Speler1ID, Speler2ID, Score1, Score2, WinnaarID) VALUES ('$ToernooiID', '$Ronde', '$Speler1ID', '$Speler2ID', '$Score1', '$Score2', '$WinnaarID')"); 
		$_SESSION['message'] = "Wedstrijd Uitslag opgeslagen"; 
		header('location: Wedstrijden.php');
    } 
	if (isset($_POST['update'])) {
        //update method
		$ID = $_POST['ID'];
		$Omschrijving = $_POST['Omschrijving'];
		$Datum = $_POST['Datum'];	
	
		mysqli_query($db, "UPDATE wedstrijd SET ToernooiID ='$ToernooiID', Ronde ='$Ronde', Speler1ID ='$Speler1ID', Speler2ID='$Speler2ID', Score1='$Score1', Score2='$Score2', WinnaarID='$WinnaarID' WHERE ID=$ID");
		echo $Omschrijving;
		$_SESSION['message'] = "Wedstrijd Uitslag aangepast!"; 
		header('location: Wedstrijden.php');
	}
	if (isset($_GET['del'])) {
        //delete method
		$ID = $_GET['del'];
		mysqli_query($db, "DELETE FROM wedstrijd WHERE ID=$ID");
		$_SESSION['message'] = "Wedstrijd Uitslag verwijderd!"; 
		header('location: Wedstrijden.php');
	}