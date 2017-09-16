<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" charset="utf-8">
	<title>Jokes Search</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
</head>
<body>
	<div class = "container">
	<div class = "row">
	<form action="submit.php" method="POST" class = "col s12">
		<?php
			$servername = "localhost";
         	$username = "root";
         	$password = "";
         	$dbname = "jokes";
         	$conn = mysqli_connect($servername, $username, $password,$dbname);

         	if(!$conn) {
         		die("Connection Failed".mysqli_connect_error());
         	}
         	$sql = "SELECT DISTINCT list_category from stupidstuff";
         	$result= mysqli_query($conn, $sql);
		?>
		<div class ="row">
		<div class="input-field col s12">
		<select name="cat">
			<?php
				if(mysqli_num_rows($result) > 0) {
					while($row=mysqli_fetch_assoc($result)) {
						echo "<option value='".$row["list_category"]."'>".$row["list_category"]."</option>";
					}
				}
			?>
		</select>
		<label>Select Joke Category</label>
	</div>
	</div>
		<input type="submit" value="Submit">
	</form>
</div>
	<form action="edit.php" method="POST">
		Enter the ID:
		<input type="text" name="sendid">
		<input type="submit" value="Submit">
	</form>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
    		$('select').material_select();
  		});
	</script>
</body>
</html>