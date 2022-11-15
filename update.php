<?php

 include 'dbBroker.php';
  include '../model/termin.php'; 

    if(isset($_POST['ime'])){


        $ime=$_POST['ime'];
        $prezime=$_POST['prezime'];
        $usluga=$_POST['usluga'];
        $datum=$_POST['datum'];
        $brojtelefona=$_POST['brojtelefona'];
      $id=$_POST['id'];
       
        $result= mysqli_query($conn,"UPDATE termin SET ime='$ime',prezime='$prezime',usluga='$usluga',datum='$datum',brojtelefona='$brojtelefona' where terminid='$id'");

       if($result ){
           echo "Termin je azuriran!";
       }
       else{
          echo "Termin nije azuriran!";
  }

}
   

?>