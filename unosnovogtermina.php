
<!DOCTYPE html>


<?php
include "dbBroker.php";
include "model/user.php";
include "model/termin.php";


$user=User::vratiSve($conn);

if(isset( $_POST['dodaj'] )){
	
	$ime=trim($_POST['ime']);
	$prezime=trim($_POST['prezime']);
    $usluga=trim($_POST['usluga']);
    $datum=trim($_POST['datum']);
    $brojtelefona=trim($_POST['brojtelefona']);
    $user=$_POST['user'];
    
	
	
	$data = Array (
				"ime" => $ime, 
				"prezime" => $prezime,
				"usluga" => $usluga,					
				"datum" => $datum,
                "brojtelefona"=>$brojtelefona,					
                "userid" => $user,    
        );	
        
	$termin=new Termin(null,$ime,$prezime,$usluga,$datum,$brojtelefona,$user);
		
		$termin->ubaciTermin($data,$conn);
		
       
        header("Location:unosnovogtermina.php");
        
}
?>


<html>

<head>
<link rel="icon" href="img/favicon.ico" type="image/ico"/>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/unostermina.css">
    
    <script src="js/main.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> 
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script> 
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script> 
    <title>Unos termina</title>
</head>

<body>
    
    <div class="row">
        <div id="uni-logos-wrapper" class="col-12">
            
        </div>
    </div>
    <div id="inser-form" class="row form-container">
        <div class="col-md-2"></div>
        <div id="teatar-bg-img" class="col-md-4"></div>
        <div class="col-md-4">
            <form name="unosTermina" action="" onsubmit="return validateForm()" method="POST" role="form">
                <div class="form-group">
                    <label for="ime">Ime</label>
                    <input type="text" class="form-control" name="ime" id="ime" placeholder="Unesite ime ">
                </div>
                <div class="form-group">
                    <label for="prezime">Prezime</label>
                    <input type="text" class="form-control" name="prezime" id="prezime" placeholder="Unesite prezime">

                </div>
                <div class="form-group">
                    <label for="usluga">Usluga</label>
                    <input type="text" class="form-control" name="usluga" id="usluga" placeholder="Unesite uslugu ">

                </div>

                <div class="form-group">
                    <label for="datum">Datum </label>
                    <input type="text" class="form-control" name="datum" id="datum" placeholder="Unesite datum  ">

                </div>
                <div class="form-group">
                    <label for="brojtelefona">Broj telefona </label>
                    <input type="text" class="form-control" name="brojtelefona" id="brojtelefona" placeholder="Unesite broj telefona  ">

                </div>

                <div class="form-group">
                    <label for="user">Email</label>

                    <select class="form-control" name="user" id="user">
                        <?php foreach($user as $v): ?>
                        <option value="<?php echo $v->userid;?>">
                            <?php echo $v->email;?>
                        </option>
                        <?php endforeach; ?>
                    </select>

                </div>
                <div class="form-group">
                    <button type="submit" id="dodaj" name="dodaj" class="btn-round-custom">Zakaži</button>
                    
                </div>
            </form>
            <a class="btn-round-custom" href="zakazivanje.php" role="button">Zakazani termini</a>
        </div>
        <div class="col-md-2"></div>
    </div>
 
</body>

</html>