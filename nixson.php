<?php
error_reporting(0);
require 'data/connection.php';

if(mysqli_connect_errno()){
    echo mysqli_connect_error();
    exit();
}else{
    $selectQuery = "SELECT * FROM `userdata` WHERE date = CURDATE() ORDER BY 'id'";
    $result = mysqli_query($conn,$selectQuery);
    if(mysqli_num_rows($result) > 0){
    }else{
        $msg = "No Record found";
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
    <div class="tag">
        <table id="data">
            <tr>
                <td style="background: none; border-left: none; border-right: none; border-top: none; border-bottom: none "><input id="btnExport" onclick="export_data()" value="Export" style="background: rgb(149, 218, 47); width: 60px;" type="button" value="Export" /></td>
              <td style="background: none; border-left: none; border-right: none; border-top: none; border-bottom: none "><a href="nixson.php" style="background: rgb(149, 218, 47); width: 100px; padding: 7px; text-decoration: none; color: white; border-radius: 3px;" type="submit" >Daily</a>
              <td style="background: none; border-left: none; border-right: none; border-top: none; border-bottom: none "><a href="nixson1.php" style="background: rgb(149, 218, 47); width: 100px; padding: 7px; text-decoration: none; color: white; border-radius: 3px;" type="submit" >All</a>
             </tr>
            <tr>
                <th>Date</th>
                <th>Username</th>
                <th>Contact</th>
                <th>Website</th>
                <th>Agent</th>
                <th>Firtst Deposit</th>
                <th>TL</th>
            </tr>
            <?php
                while($row = mysqli_fetch_assoc($result)){?>
            <tr>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['contact']; ?></td>
                <td><?php echo $row['website']; ?></td>
                <td><?php echo $row['agent']; ?></td>
                <td><?php echo $row['deposit']; ?></td>
                <td>Nixon</td>
            </tr>
          <?php }?>
        </table>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>

<script>
function export_data(){
	let data=document.getElementById('data');
	var fp=XLSX.utils.table_to_book(data,{sheet:'vishal'});
	XLSX.write(fp,{
		bookType:'xlsx',
		type:'base64'
	});
	XLSX.writeFile(fp, 'test.xlsx');
}
</script>
    </div>
  </body>
</html>