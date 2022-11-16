<?php
   include "dbBroker.php";
   include "model/termin.php";


 $id=$_GET['brisanjeid'];
 $result= mysqli_query($conn,"DELETE FROM termin WHERE terminid='".$id."'");
 header("Location:zakazivanje.php");
 ?>  
<!DOCTYPE html>
    <link rel="icon" href="img/favicon.ico" type="image/ico"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    </html>