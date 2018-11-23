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
<body><form action="create.php"  method = "post">


<h4>first name</h4>
  <input required type="text" name="fname"  id="btn2"value="" style=" width: 100%;padding: 12px 50px;
  margin: 8px 0;display: inline-block;border:1px solid #ccc;border-radius: 4px;box-sizing: border-box;">
<h4>last name</h4>
  <input required type="text" name="last_name" id="btn3"value="" style=" width: 100%;padding: 12px 50px;
  margin: 8px 0;display: inline-block;border:1px solid #ccc;border-radius: 4px;box-sizing: border-box;">
<h4>phone title</h4>
  <input required type="text" name ="phone_title" id="btn4"value="" style=" width: 100%;padding: 12px 50px;
  margin: 8px 0;display: inline-block;border:1px solid #ccc;border-radius: 4px;box-sizing: border-box;">
<h4>phonenumber</h4>
  <input required type="text" name ="phone" id="btn5"value="" style=" width: 100%;padding: 12px 50px;
  margin: 8px 0;display: inline-block;border:1px solid #ccc;border-radius: 4px;box-sizing: border-box;">
 <h4>default_number</h4>
  <input required type="text" name ="default-num" id="btn6"value="" style=" width: 100%;padding: 12px 50px;
  margin: 8px 0;display: inline-block;border:1px solid #ccc;border-radius: 4px;box-sizing: border-box;">

  <input required type="submit" id="btn"value="create" name="create contact" style=" width: 100%;padding: 12px 50px;
    margin: 8px 0;display: inline-block;border:1px solid #ccc;border-radius: 4px;box-sizing: border-box;">
</form></body>
<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
 $name = $_POST['fname'];
 $surname = $_POST['last_name'];
 $phone = $_POST['phone'];
 $default_num = $_POST['default-num'];
 $phone_title = $_POST['phone_title'];

 function db_connect(){
   $servername = "localhost";
   $username 	= "root";
   $password 	= "machine1";
   $dbname 		= "contacts";
   $conn = mysqli_connect($servername, $username, $password,$dbname);
   return $conn;
 }
 $conn = db_connect();
 $name = mysqli_real_escape_string($conn,$name);
 $surname = mysqli_real_escape_string($conn,$surname);
 $phone = mysqli_real_escape_string($conn,$phone);
     $sql = "INSERT INTO contact"." (first_name,last_name)"." VALUES ('".  $name."' , '".$surname."');";
     $results = mysqli_query($conn, $sql);
     if($results){
       $contactID = mysqli_insert_id($conn);

       $sql = "INSERT INTO phone_numbers" ." (phone_title,phone_number, default_num ,contact_id)"
       ." VALUES ('".$phone_title."','".$phone."','".$default_num."','".$contactID."');";
       $results = mysqli_query($conn, $sql);
       echo "data inserted in tables";
       if(!$results ){
         die("SQL error " . mysqli_error($conn));
       }
     } else{
       die("SQL error " . mysqli_error($conn));
     }
   }//if server method
?>
</html>
