<!DOCTYPE html>
<html>
<body>
<?php include 'nav.php';?>
<a href="Brackets.php">Toernooi structuur</a>
<a href="Wedstrijden2.php">Wedstrijd uitslag</a>
<?php  include('UitslagBeheer.php'); ?>
<?php 
error_reporting(0);
@ini_set('display_errors', 0);
//disable page errors
	if (isset($_GET['edit'])) {
		//if method is edit prepare edit form with set values
		$ID = $_GET['edit'];
		$update = true;
        $record = mysqli_query($db, "SELECT * FROM wedstrijd WHERE ID=$ID");
        //get records & count
		if (count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$ToernooiID = $n['ToernooiID'];
            $Ronde = $n['Ronde'];
            $Speler1ID = $n['Speler1ID'];
            $Speler2ID = $n['Speler2ID'];
            $Score1 = $n['Score1'];
            $Score2 = $n['Score2'];
            $WinnaarID = $n['WinnaarID'];
		}
	}
?>
<head>
	<title>MBO Open</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM wedstrijd"); ?>
<!-- select datatypes -->
<table>
	<thead>
		<tr>
			<th>ToernooiID</th>
            <th>Ronde</th>
            <th>Speler1ID</th>
            <th>Speler2ID</th>
            <th>Score1</th>
            <th>Score2</th>
            <th>WinnaarID</th>

			<th colspan="2">Action</th>
		</tr>
	</thead>

	<?php while ($row = mysqli_fetch_array($results)) {  ?>
		<tr>
			<td><?php echo $row['ToernooiID']; ?></td>
            <td><?php echo $row['Ronde']; ?></td>
            <td><?php echo $row['Speler1ID']; ?></td>
            <td><?php echo $row['Speler2ID']; ?></td>
            <td><?php echo $row['Score1']; ?></td>
            <td><?php echo $row['Score2']; ?></td>
            <td><?php echo $row['WinnaarID']; ?></td>
			<td>
				<a href="Wedstrijden.php?edit=<?php echo $row['ID']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="UitslagBeheer.php?del=<?php echo $row['ID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>



	<form method="post" action="UitslagBeheer.php" >
	<input type="hidden" name="ID" value="<?php echo $ID; ?>">
<!-- Create table for all input data -->
	<div class="input-group">
		<label>ToernooiID</label>
		<input type="text" name="ToernooiID" value="<?php echo $ToernooiID; ?>">
	</div>
	<div class="input-group">
		<label>Ronde</label>
		<input type="text" name="Ronde" value="<?php echo $Ronde; ?>">
	<div class="input-group">
    <div class="input-group">
		<label>Speler1ID</label>
		<input type="text" name="Speler1ID" value="<?php echo $Speler1ID; ?>">
	<div class="input-group">
    <div class="input-group">
		<label>Speler2ID</label>
		<input type="text" name="Speler2ID" value="<?php echo $Speler2ID; ?>">
	<div class="input-group">
    <div class="input-group">
		<label>Score1</label>
		<input type="text" name="Score1" value="<?php echo $Score1; ?>">
	<div class="input-group">
    <div class="input-group">
		<label>Score2</label>
		<input type="text" name="Score2" value="<?php echo $Score2; ?>">
	<div class="input-group">
    <div class="input-group">
		<label>WinnaarID</label>
		<input type="text" name="WinnaarID" value="<?php echo $WinnaarID; ?>">
	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>
	</div>
	</form>
</body>
</html>
