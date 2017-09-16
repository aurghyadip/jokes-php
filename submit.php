<html lang = "en">
   
   <head>
   	  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" charset="utf-8">
      <title>Paging Using PHP</title>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
   
   <body>
   	<div class="container">
      <?php
         $servername = "localhost";
         $username = "root";
         $password = "";
         $dbname = "jokes";
         $conn = mysqli_connect($servername, $username, $password,$dbname);

         if(!$conn) {
         	die("Connection Failed".mysqli_connect_error());
         }

         $category = $_POST["cat"];

         $sql = "SELECT list_id, list_body from stupidstuff where list_category in ('$category')";
         $result = mysqli_query($conn, $sql);

         if(mysqli_num_rows($result) > 0) {
			while($row=mysqli_fetch_assoc($result)) {
				echo "<h3>".$row["list_id"]."</h3>"."<p>".$row["list_body"]."</p>";
			}
		}
      ?>
  </div>

  	  <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
   </body>
</html>