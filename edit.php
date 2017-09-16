<html lang = "en">
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" charset="utf-8">
		<title>Paging Using PHP</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
		<script language="javascript" type="text/javascript" src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
		<script language="javascript" type="text/javascript">
			tinymce.init({ selector:'textarea' });
		</script>
	</head>  
	
	<body>
		<div class="container">
			<form action="edited.php" method="POST">
				<?php
					$list_id = $_POST["sendid"];
					$servername = "localhost";
         			$username = "root";
         			$password = "";
         			$dbname = "jokes";
         			$conn = mysqli_connect($servername, $username, $password,$dbname);

         			if(!$conn) {
         				die("Connection Failed".mysqli_connect_error());
         			}
         			$sql = "SELECT list_body from stupidstuff where list_id='$list_id'";
         			$result= mysqli_query($conn, $sql);
         			$row=mysqli_fetch_assoc($result);
         		?>
         		<input type="textbox" name="list_id" value=<?php echo $list_id ?> hidden>
         		<textarea id="elm1" name="elm1" rows="15" cols="80"> <?php echo $row["list_body"]; ?> </textarea>
         		<input type="submit" value="Submit">
			</form>
		</div>

		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	</body>
</html>