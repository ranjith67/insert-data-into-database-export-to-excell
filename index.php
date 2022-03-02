<?php 
error_reporting(0);
require 'data/connection.php';

if(isset($_POST["upload"])){
  $username = $_POST["username"];
  $contact = $_POST["contact"];
  $website = $_POST["website"];
  $agent = $_POST["agent"];
  $deposit = $_POST["deposit"];

  $query = "INSERT INTO `userdata`(`username`, `contact`, `website`, `agent`, `deposit`) VALUES ('$username','$contact','$website','$agent','$deposit')";
  $query_run= mysqli_query($conn, $query);
  
  if($query_run){
    echo '<script>alert("Inserted Successfully");</script>';
  }else{
    echo '<script>alert("Not Inserted")</script>';
  
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="CSS/style.css" />
    <title>Nixon|Marketing Team</title>
  </head>
  <body>
    <div class="parent parent1"></div>
    <div class="parent parent2"></div>
    <div class="parent parent3"></div>
      <div class="tab">
        <form action="" method="POST">
          <input type="text" placeholder="Username" name="username" require/>
          <br />
          <input type="number" placeholder="Contact" name="contact"require/>
          <br />
          <select name="website" require>
            <option disabled selected>Website</option>
            <option class="hari" value="King567">King567</option>
            <option class="hari" value="Playwin567">Playwin567</option>
            <option class="hari" value="Winexch567">Winexch567</option>
            <option class="hari" value="Luck567">Luck567</option>
            <option class="hari" value="Lion567">Lion567</option>
            <option class="hari" value="Play567">Play567</option>
          </select>
          <br />
          <select name="agent" require>
            <option disabled selected>Agent</option>
            <option class="hari" value="Miraz">Miraz</option>
            <option class="hari" value="Archana">Archana</option>
            <option class="hari" value="Derick">Derick</option>
            <option class="hari" value="Sowmya Babu">Sowmya Babu</option>
          </select>
          <br />
          <input type="number" name="deposit" placeholder="First Deposit" require/>
          <br />
          <input type="submit" name="upload"/>
        </form>
      </div>
  </body>
</html>
