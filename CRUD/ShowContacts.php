<!DOCTYPE html>
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
    <title>view contacts</title>
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
    <table class="table table-bordered">
      <tr>
        <th >ID</th>
        <th >First Name</th>
        <th >Last Name</th>
        <th >Phone Title</th>
        <th >Phone Number</th>
        <th >Default Number</th>
        <th> options  </th>

      </tr>
      <?php
        function db_connect(){
          $servername = "localhost";
          $username 	= "root";
          $password 	= "";
          $dbname 		= "contacts";
          $conn = mysqli_connect($servername, $username, $password,$dbname);
          return $conn;
        }
        $conn = db_connect();

      $contacts = array();
        $phones = array();
        $sql = "SELECT * FROM contact right JOIN phone_numbers on phone_numbers.contact_id = contact.id";
        $con_results = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($con_results)) {

          echo "<tr>";
          echo "<td>" . $row['id'] . "</td>";
          echo "<td>" . $row['first_name'] . "</td>";
          echo "<td>" . $row['last_name'] . "</td>";
          echo "<td>" . $row['phone_title'] . "</td>";
          echo "<td>" . $row['phone_number'] . "</td>";
          echo "<td>" . $row['default_num'] . "</td>";
          echo "<td><form method='post'>
                <input type='hidden' name='id_to_be_deleted' value='". $row['id']."' />
                <input type='submit' name='delete_row' value='delete'/>
                </form></td>";
          echo "<td><form action ='update.php' method='post'>
                      <input type='hidden' name='id_to_be_modified' value='". $row['id']."' />
                      <input type='submit' name='update_row' value='update'/>
                      </form></td>";
       }
          if(isset($_POST['delete_row'])) {
             $id = $_POST['id_to_be_deleted'];
             if(!mysqli_query($conn, "DELETE FROM contact WHERE id = $id") ||
              !mysqli_query($conn, "DELETE FROM phone_numbers WHERE contact_id = $id")) {
               echo mysqli_error($conn);
               header("Refresh:0");

               //echo '<script>window.location.href = "ShowContacts.php";exit();</script>';
             } elseif ($conn == false) {
               echo "delete failed";
             }

        }//if isset close

//while closedi
// if (isset($_POST['update_row'])){
//
//   $id = $_POST['id_to_be_modified'];
//   $name = $_post['first_name'];
//   $surname = $_post['last_name'];
//   $phone = $_post['phone_number'];print_r($phone);
//   if(!mysqli_query($conn,"UPDATE contact SET first_name ='$name' ,  last_name ='$surname'  WHERE id= '$id' ")){
//     echo mysqli_error($conn);
//   } else {echo "delete failed";}
//
// }
        ?>
    </table>
  </body>
</html> 






                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
