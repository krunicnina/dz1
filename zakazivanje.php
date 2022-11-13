<?php
 include "dbBroker.php";
include "model/termin.php";
include "model/user.php";

 $uslov='';
   $termini = Termin::vratiSve($conn,$uslov);
   $query = "SELECT * FROM termin ORDER BY id DESC";  
   $result = mysqli_query($conn, $query); 


?> 
 <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="stylesheet" href="css/zakazivanje.css">  

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />

<title>Zakazani termini</title>
</head>
<body>
<section>
<div class="container" id="table">

             <table class="table table-light table-striped table-hover table-borderless"> 
                <thead class="thead-light">
                    <tr class="active">
                    


                        <th scope="col" >Ime</a></th>
                        <th scope="col" >Prezime</a></th>
                        <th scope="col" >Usluga</a></th>
                        <th  scope="col">Datum</th>
                        <th  scope="col">Broj Telefona</th>
                        <th  scope="col">Email</th>
                    </tr>
                  </thead>
                    <tbody>
                    <?php  $table=mysqli_query($conn,"SELECT * FROM termin t JOIN user u  ON t.userid=u.userid");
                    while($row=mysqli_fetch_array($table)){
                        ?>
               
                                  <tr class="warning" id="<?php echo $row['terminid']; ?>">
                                    <td data-target="ime"><?php echo $row['ime'];?></td>
                                    <td data-target="prezime"><?php echo $row['prezime'];?></td>
                                    <td data-target="usluga"><?php echo $row['usluga'];?></td>
                                    <td data-target="datum"><?php echo $row['datum'];?></td>
                                    <td data-target="brojtelefona"><?php echo $row['brojtelefona'];?></td>
                                    <td data-target="email"><?php echo $row['email'];?></td>
                                 
                                       
                                    </tr>
                        <?php }
                          ?> 
                </tbody>
            </table>
            </div>
            </section>
                    </body>
            </html>