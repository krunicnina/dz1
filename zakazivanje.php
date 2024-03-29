<?php
 include "dbBroker.php";
include "model/termin.php";
include "model/user.php";

 $uslov='';
   $termini = Termin::vratiSve($conn,$uslov);
  $query = "SELECT * FROM termin t JOIN user u on t.userid=u.userid ORDER BY t.userid DESC"; 
   $result = mysqli_query($conn, $query); 


?> 
 <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/zakazivanje.css">  
<title>Zakazani termini</title>

    
</head>

<body>


  
<section>

<div class="container" id="table">

             <table class="table table-light table-striped table-hover table-borderless"> 
                <thead class="thead-light">
                    <tr class="active">
                    


                        <th scope="col" ><a class="column_sort" mid="ime" data-order="desc" href="#" style="color:black">Ime</a></th>
                        <th scope="col" ><a class="column_sort" mid="prezime" data-order="desc" href="#" style="color:black" >Prezime</a></th>
                        <th scope="col" ><a class="column_sort" mid="usluga" data-order="desc" href="#" style="color:black" >Usluga</a></th>
                        <th  scope="col">Datum i vreme</th>
                        <th  scope="col">Broj Telefona</th>

                         <th scope="col" ><a class="column_sort" mid="email" data-order="desc" href="#" style="color:black">Email</a></th>
                        <th  scope="col">Izmeni termin</th> 
                        <th >Obriši termin</th> 
                      
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
                                    <td><a href="#" style="color:black" data-role="update" data-id="<?php echo $row['terminid'] ?>" >Izmeni termin</a></td>
                                    <td><a style="color:black" href="obrisitermin.php?brisanjeid=<?php echo $row['terminid']; ?>" >
                                           Delete </td>
                                        </a>
                                    </tr>
                        <?php }
                          ?> 
                            
                
                </tbody>
            </table>
      
            <a class="btn-round-custom" href="pretraga.php" role="button">Pretraži termine</a>
            <a class="btn-round-custom" href="index.php" role="button">Nazad na početnu</a>
            </div>
            </section>
           
            <div id="myModal" class="modal fade"  role="dialog" >
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Izmeni termin</h4>
      </div>
      <div class="modal-body">
       <div class="form"-group>
<label> Ime</label>
<input type="text" id="ime" class="form-control">
</div>
<div class="form"-group>
<label> Prezime</label>
<input type="text" id="prezime" class="form-control">
</div>
<div class="form"-group>
<label> Usluga</label>
<input type="text" id="usluga" class="form-control">
</div>
<div class="form"-group>
<label> Datum</label>
<input type="text" id="datum" class="form-control">
</div>
<div class="form"-group>
<label> Broj telefona</label>
<input type="text" id="brojtelefona" class="form-control">
</div>
<div class="form"-group>
<label> Email</label>
<input type="text"  id="email" class="form-control" readonly>
</div>
<input type="hidden" id="tid" class="form-control">
</div>
       
     
      <div class="modal-footer">
        <a href="#" id="save" class="btn btn-primary pull-left">Update </a>
        <button type="button" class="btn btn-default pull-right"style="background-color: red; color:black;" data-dismiss="modal">Close</button>
      </div>
    </div>
    </div>
  </div>
  



</body>
<script> $(document).ready(function(){
        $(document).on('click','a[data-role=update]',function(){
            var id=$(this).data('id');
            var ime= $('#'+id).children('td[data-target=ime]').text();
            var prezime= $('#'+id).children('td[data-target=prezime]').text();
            var usluga= $('#'+id).children('td[data-target=usluga]').text();
            var datum= $('#'+id).children('td[data-target=datum]').text();
            var brojtelefona= $('#'+id).children('td[data-target=brojtelefona]').text();
            var email= $('#'+id).children('td[data-target=email]').text();
            $("#ime").val(ime);
            $("#prezime").val(prezime);
            $("#usluga").val(usluga);
            $("#datum").val(datum);
            $("#brojtelefona").val(brojtelefona);
            $("#email").val(email);
           $("#tid").val(id);
               $("#myModal").modal("toggle");

        

        });
        $('#save').click(function(){
var id= $('#tid').val();
var ime= $("#ime").val();
var prezime= $("#prezime").val();
var usluga= $("#usluga").val();
var datum= $("#datum").val();
var brojtelefona= $("#brojtelefona").val();
 
$.ajax({
url:"update.php",
method: "post",
data:{ ime:ime, prezime:prezime, usluga:usluga, datum:datum, brojtelefona:brojtelefona, id:id},
success:function(response){
   $('#'+id).children('td[data-target=ime]').text(ime);
   $('#'+id).children('td[data-target=prezime]').text(prezime);
   $('#'+id).children('td[data-target=usluga]').text(usluga);
 $('#'+id).children('td[data-target=datum]').text(datum);
 $('#'+id).children('td[data-target=brojtelefona]').text(brojtelefona);
   $('#myModal').modal('toggle');
}
});
  }) ;
    });

    </script>
     <script>  
 $(document).ready(function(){  
      $(document).on('click', '.column_sort', function(){  
           var column_name = $(this).attr("mid");  
           var order = $(this).data("order");  
           var arrow = '';  
         
           if(order == 'desc')  
           {  
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-down"></span>';  
           }  
           else  
           {    
                arrow = '&nbsp;<span class="glyphicon glyphicon-arrow-up"></span>';  
           }  
      
           $.ajax({  
                url:"sort.php",  
                method:"POST",  
                data:{column_name:column_name, order:order},  
                success:function(data)  
                {  
                     $('#table').html(data);  
                     $('#'+column_name+'').append(arrow);  
                }  
           })  
      });  
 });  
 </script> 

</html>