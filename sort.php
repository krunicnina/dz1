<?php  
 //sort.php  
 include'dbBroker.php';
 $output = '';  
 $order = $_POST["order"];  
 if($order == 'desc')  
 {  
      $order = 'asc';  
 }  
 else  
 {  
      $order = 'desc';  
 }  
 $query = "SELECT * FROM termin t JOIN user u on t.userid=u.userid ORDER BY ".$_POST["column_name"]." ".$_POST["order"]."";  
 $result = mysqli_query($conn, $query);  
 $output .= '  
 <table class="table table-light table-striped table-hover table-borderless">
      <tr class="active">  
 
           <th><a class="column_sort" mid="ime" data-order="'.$order.'" href="#" style="color:black">Ime</a></th>  
           <th><a class="column_sort" mid="prezime" data-order="'.$order.'" href="#" style="color:black">Prezime</a></th>  
           <th><a class="column_sort" mid="usluga" data-order="'.$order.'" href="#" style="color:black">Usluga</a></th>  
           <th  scope="col">Datum i vreme</th>
            <th  scope="col">Broj Telefona</th>
           <th><a class="column_sort" mid="email" data-order="'.$order.'" href="#" style="color:black">Email</a></th>  
      </tr>  
 ';  
 while($row = mysqli_fetch_array($result))  
 {  
      $output .= '  
      <tr class="warning">  
           <td>' . $row["ime"] . '</td>  
           <td>' . $row["prezime"] . '</td>  
           <td>' . $row["usluga"] . '</td>  
           <td>' . $row["datum"] . '</td> 
           <td>' . $row["brojtelefona"] . '</td> 
           <td>' . $row["email"] . '</td>  
      </tr>  
      ';  
 }  
 $output .= '</table>';  
 echo $output;  
 ?> 