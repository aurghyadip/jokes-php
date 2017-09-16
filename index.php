<?php
	$servername = "localhost";
   	$username = "root";
    $password = "";
    $dbname = "jokes";
    $conn = mysqli_connect($servername, $username, $password,$dbname);
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" charset="utf-8">
	<title>Jokes Search</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
</head>
<body>
	<div class ="container">
	<div class ="row">
		<div class ="col s6">
			<div class ="row">
				<form action="jokes.php" method="POST" class="col s12">
					<h2>StupidStuff Jokes</h2>
					<input type="text" name="tablename" value="stupidstuff" hidden>
					<?php
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
							<button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
						</div>
					</div>
				</form>
			</div>
			<div class="row">
				<form action="edit.php" method="POST" class="col s12">
					<h4>Edit a Joke</h4>
					<label for="joke_id">Joke ID</label>
					<input placeholder ="Enter Joke ID here" type="text" id="joke_id" name="sendid">
					<button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
				</form>
			</div>
		</div>
		<div class="col s6">
		<div class ="row">
				<form action="jokes.php" method="POST" class="col s12">
					<h2>Wocka Jokes</h2>
					<input type="text" name="tablename" value="wocka" hidden>
					<?php
			    	     if(!$conn) {
			    	     	die("Connection Failed".mysqli_connect_error());
			    	     }
			    	     $sql = "SELECT DISTINCT list_category from wocka";
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
							<button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
						</div>
					</div>
				</form>
			</div>
			<div class="row">
				<form action="edit.php" method="POST" class="col s12">
					<h4>Edit a Joke</h4>
					<label for="joke_id">Joke ID</label>
					<input placeholder ="Enter Joke ID here" type="text" id="joke_id" name="sendid">
					<button class="btn waves-effect waves-light" type="submit" name="action">Submit</button>
				</form>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
    		$('select').material_select();
  		});
	</script>
	<?php mysqli_close($conn); ?>
</body>
</html>