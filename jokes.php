<html lang = "en">
   
   <head>
   	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" charset="utf-8">
      <title>Paging Using PHP</title>
      <link href="https://fonts.googleapis.com/css?family=Merriweather:900|Raleway:500" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
      <style type="text/css">
         p {
            font-family: 'Raleway', sans-serif;
            border-style: solid;
            padding: 10px;
            text-align: justify;
         }
         h4 {
            font-family: 'Merriweather', serif;
         }
      </style>
   </head>
   <body>
      <div class="container">
      <div class="row">
      <div class="col s3">
      </div>
      <div class="col s9">
      <?php
         $servername = "localhost";
         $username = "root";
         $password = "";
         $dbname = "jokes";
         $conn = mysqli_connect($servername, $username, $password,$dbname);

         if(!$conn) {
         	die("Connection Failed".mysqli_connect_error());
         }

         $tablename = $_POST["tablename"];
         $category = $_POST["cat"];

         if($tablename == "stupidstuff") {
            $sql = "SELECT list_id, list_body from $tablename where list_category in ('$category')";
         } else if($tablename == "wocka") {
            $sql = "SELECT list_id, list_title, list_body from $tablename where list_category in ('$category')";
         }
         $result = mysqli_query($conn, $sql);
         if($tablename == "stupidstuff") {
            if(mysqli_num_rows($result) > 0) {
               while($row=mysqli_fetch_assoc($result)) {
			      	echo "<p>".$row["list_body"]."</p> <hr>";
			      }
            }
         } else if($tablename == "wocka") {
            if(mysqli_num_rows($result) > 0) {
               while($row=mysqli_fetch_assoc($result)) {
                  echo "<h4>".$row["list_title"]."</h4>"."<p>".$row["list_body"]."</p> <hr>";
               }
            }
         }
      ?>
      </div>
      </div>
      </div>

      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
      <?php mysqli_close($conn); ?>
   </body>
</html>