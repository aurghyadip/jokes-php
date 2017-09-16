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
				<?php
					$content = $_POST["elm1"];
					$list_id = $_POST["list_id"];
					$servername = "localhost";
         			$username = "root";
         			$password = "";
         			$dbname = "jokes";
         			$conn = mysqli_connect($servername, $username, $password,$dbname);

         			if(!$conn) {
         				die("Connection Failed".mysqli_connect_error());
         			}
         			$sql = "UPDATE stupidstuff SET list_body='$content' WHERE list_id='$list_id'";
         			if (mysqli_query($conn, $sql)) {
 					   header("Location: /jokes");
					} else {
   						echo "Error updating record: " . mysqli_error($conn);
					}
         		?>
		</div>

		<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
	</body>
</html>