<html lang="en" dir="ltr">
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
    <meta charset="utf-8">
    <title>update data</title>
    <style>
table{
  font-family: arial, sans-serif;
                      border-collapse: collapse;
                    width: 100%;

}
td, th {
                    border: 1px solid #dddddd;
                    text-align: left;
                    padding: 8px;
                }

                tr:nth-child(even) {
                    background-color: #dddddd;
                }
  </style>
  </head>
  <body>

    <?php
    $conn = db_connect();
$id = $_POST['id_to_be_modified'];
print_r($id);
    $contacts = array();
    $phones = array();
    $sql = "SELECT * FROM contact INNER JOIN phone_numbers on phone_numbers.contact_id = contact.id WHERE contact.id = '$id' "  ;
    $con_results = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($con_results);
    print_r($row);

    ?>
    <form action="update.php"  method = "post">

<h4>id</h4>
      <input  type="text" readonly ='true' name='id' id="btn1" value="<?php echo $_POST['id_to_be_modified'] ?>" style=" width: 100%;padding: 12px 50px;
      margin: 8px 0;display: inline-block;border:1px solid #ccc;border-radius: 4px;box-sizing: border-box;">
<h4>first name</h4>
      <input  type="text" name="fname"  id="btn2"value="<?php echo $row['first_name'] ?> " style=" width: 100%;padding: 12px 50px;
      margin: 8px 0;display: inline-block;border:1px solid #ccc;border-radius: 4px;box-sizing: border-box;">
<h4>last name</h4>
      <input  type="text" name="last_name" id="btn3"value="<?php echo $row['last_name'] ?>" style=" width: 100%;padding: 12px 50px;
      margin: 8px 0;display: inline-block;border:1px solid #ccc;border-radius: 4px;box-sizing: border-box;">
<h4>phone title</h4>
      <input  type="text" id="btn4"value="<?php echo $row['phone_title'] ?>" style=" width: 100%;padding: 12px 50px;
      margin: 8px 0;display: inline-block;border:1px solid #ccc;border-radius: 4px;box-sizing: border-box;">
<h4>phonenumber</h4>
      <input  type="text" name ="phone" id="btn5"value="<?php echo $row['phone_number'] ?>" style=" width: 100%;padding: 12px 50px;
      margin: 8px 0;display: inline-block;border:1px solid #ccc;border-radius: 4px;box-sizing: border-box;">
     <h4>default_number</h4>
      <input  type="text" id="btn6"value="<?php echo $row['default_num'] ?>" style=" width: 100%;padding: 12px 50px;
      margin: 8px 0;display: inline-block;border:1px solid #ccc;border-radius: 4px;box-sizing: border-box;">
      <input  type="submit" id="btn"value="update" name="update" style=" width: 100%;padding: 12px 50px;
        margin: 8px 0;display: inline-block;border:1px solid #ccc;border-radius: 4px;box-sizing: border-box;">
  </form>
</body>
<?php

//print_r($_POST['id_to_be_modified']);
function db_connect(){
  $servername = "localhost";
  $username 	= "root";
  $password 	= "machine1";
  $dbname 		= "contacts";
  $conn = mysqli_connect($servername, $username, $password,$dbname);
  return $conn;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
  if (isset($_POST['update'])) {
    $name =$_POST['fname'];
    $surname= $_POST['last_name'];
    $id = $_POST['id'];
    $phone = $_POST['phone'];print_r($phone);

  $conn = db_connect();
 $sql = " UPDATE contact SET first_name ='$name' ,  last_name ='$surname'  WHERE id= '$id' " ;
 $result = mysqli_query($conn,$sql);

 if ($result) {
   echo " data is updated ";
   echo "<br/>";
 }else {
   die("data failed".mysqli_error($conn));
   echo "<br/>";
 }

 $sql = " UPDATE phone_numbers SET phone_number ='$phone' WHERE contact_id= '$id' " ;
 $result = mysqli_query($conn,$sql);

 if ($result) {
   echo "phone updated <br>";
 }else {
   die("data failed".mysqli_error($conn));
   echo "<br/>";
 }

}//if isset close
}//server method close

 ?>
