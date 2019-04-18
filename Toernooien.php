<?php  include('Beheer.php'); ?>
<?php include 'nav.php';?>
<?php 
error_reporting(0);
@ini_set('display_errors', 0);
	if (isset($_GET['edit'])) {
		//if method is edit prepare edit form with set values
		$ID = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM toernooien WHERE ID=$ID");
		if (count($record) == 1 ) {
			//get records & count
			$n = mysqli_fetch_array($record);
			$Omschrijving = $n['Omschrijving'];
			$Datum = $n['Datum'];
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>MBO Open</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM toernooien"); ?>

<table>
	<thead>
		<tr>
			<th>Omschrijving</th>
			<th>Datum</th>

			<th colspan="2">Action</th>
		</tr>
	</thead>

	<?php while ($row = mysqli_fetch_array($results)) {  ?>
		<tr>
			<td><?php echo $row['Omschrijving']; ?></td>
			<td><?php echo $row['Datum']; ?></td>
			<td>
				<a href="Toernooien.php?edit=<?php echo $row['ID']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="Beheer.php?del=<?php echo $row['ID']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
<!-- Create table for all input data -->


	<form method="post" action="Beheer.php" >
	<input type="hidden" name="ID" value="<?php echo $ID; ?>">

	<div class="input-group">
		<label>Omschrijving</label>
		<input type="text" name="Omschrijving" value="<?php echo $Omschrijving; ?>">
	</div>
	<div class="input-group">
		<label>Datum</label>
		<input type="text" name="Datum" value="<?php echo $Datum; ?>">
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