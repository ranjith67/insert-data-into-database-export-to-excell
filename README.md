
# insert-data-into-database-export-to-excell

Using this you can insert data into the database & fetch your data into an HTML table to Excel.




## Deployment

Connection to database.

```bash
    <?php
    $conn = mysqli_connect("localhost","root","","DBname");
    ?>
```
Inserting data into the database.

```bash
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
```
For fetching current date data.

```bash
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
```
For fetching entire data.

```bash
    <?php
    error_reporting(0);
    require 'data/connection.php';

    if(mysqli_connect_errno()){
        echo mysqli_connect_error();
        exit();
    }else{
        $selectQuery = "SELECT * FROM `userdata` ORDER BY 'id'";
        $result = mysqli_query($conn,$selectQuery);
        if(mysqli_num_rows($result) > 0){
        }else{
            $msg = "No Record found";
        }
    }
    ?>
```

JS script for exporting the table to excel.

```bash

    <table id="data">

    <input id="btnExport" onclick="export_data()" value="Export" style="background: rgb(149, 218, 47); width: 60px;" type="button" value="Export" />

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
```
## Authors

- [@ranjith67](https://github.com/ranjith67)

