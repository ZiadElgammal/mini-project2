<html>
<head>
  <div class="topnav">
  <a class="active" href="ShowContacts.php">Home</a>
  <a href="create.php">add contact</a>
  <a href="search.php">search</a>
  <a href="ShowContacts.php">list contacts</a>
  </div>
  <style>.topnav {
  background-color: #333;
  overflow: hidden;
  }

  /* Style the links inside the navigation bar */
  .topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  }

  /* Change the color of links on hover */
  .topnav a:hover {
  background-color: #ddd;
  color: black;
  }
  .topnav a.active {
  background-color: #4CAF50;
  color: white;
  }
  </style>
  <title>add contact</title>
</head>
<body>  <form action="search.php"  method = "post">
  <h4>enter the name of contact </h4>
    <input required type="text" name="fname"  id="btn2"value="" style=" width: 100%;padding: 12px 50px;
    margin: 8px 0;display: inline-block;border:1px solid #ccc;border-radius: 4px;box-sizing: border-box;">
    <input  type="submit" id="btn"value="search" name="search" style=" width: 100%;padding: 12px 50px;
      margin: 8px 0;display: inline-block;border:1px solid #ccc;border-radius: 4px;box-sizing: border-box;">
</body>
<?php
function db_connect(){
  $servername = "localhost";
  $username 	= "root";
  $password 	= "";
  $dbname 		= "contacts";
  $conn = mysqli_connect($servername, $username, $password,$dbname);
  return $conn;
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
if (isset($_POST['fname'])) {
$name= $_POST['fname'];
$conn = db_connect();
$sql = "SELECT * FROM contact  JOIN phone_numbers on phone_numbers.contact_id = contact.id WHERE contact.first_name ='$name' ";
$con_results = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($con_results)) {

  print_r($row);
  echo "<br>";
}

}//if isset close
}//if server method close
?>
</html>
