<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<html>
	<title>Login Page</title>
<body>


<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (file_get_contents('php://input',true)){
	$imported_data =file_get_contents('php://input',true);
  //print_r($imported_data);echo "</br>";
	// echo "username: " .$_POST["username"] . "</br>";
	// echo "password: " .$_POST["password"] . "</br>";
  	if(empty($_POST["username"])||empty($_POST["password"]))
     	{
	      	echo " you did not send username or password <br/> <br/> ";
	      	die;
     	}

$servername = "localhost";
$username = "root";
$password = "machine1";
$dbname = "contacts";

// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);


// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}
          echo "Connected successfully to database <br/> ";
               //    select * from users where username='root' and password = 'aasdad'
$userid = mysqli_real_escape_string($conn,$_POST["username"]);
$pass = mysqli_real_escape_string($conn,$_POST["password"]);
// $sql = "SELECT * FROM login WHERE username  = '$userid'and password = '$pass'  ";
$sql = "SELECT * FROM login WHERE username  = $userid and password = $pass  ";
$con_results = mysqli_query($conn, $sql);

$usersdb = array();//this array to save data from db
$i =0;
while($row = mysqli_fetch_assoc($con_results)) {
  $usersdb[]=$row;$i =$i+1;
        print_r($usersdb[0]['username']);

        echo " <br>“status code”:200 <br/>";
        echo "user found ";
        echo "<br>you have logged in<br>";
      //echo flush(100);
				//usleep(10);
		  echo '<script>window.location.href = "../CRUD/ShowContacts.php";</script>';

}

    if($i== 0){
	echo " “error_code”:101 <br/>";
	echo "user not found;please try again ";
	 echo '<script>window.location.href = "login.html";</script>';
   }


}//if get content close
}//server requesr close
 ?>
</body>
</html>
