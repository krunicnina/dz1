<?php 

class Termin {
    public $terminid;
    public $ime;
    public $prezime;
    public $usluga;
    public $datum;
    public $brojtelefona;
    public $user;

    public function __construct($terminid = null, $ime = null, $prezime = null, $usluga = null, $datum = null, $brojtelefona=null,$user)
    {
        $this->terminid = $terminid;
        $this->ime = $ime;
        $this->prezime = $prezime;
        $this->usluga = $usluga;
        $this->datum = $datum;
        $this->brojtelefona = $brojtelefona;
        $this->user = $user;
  
	}

	public static function vratiSve($db,$uslov){
		$query="SELECT * FROM termin t JOIN user u  ON t.userid=u.userid".$uslov;
		$query=trim($query);
        $result=$db->query($query) or die($db->error);
        $array=[];
        while($r = $result->fetch_assoc()){
			$user=new User($r['userid'],$r['email'],$r['password']);
			$termin=new Termin($r['terminid'],$r['ime'],$r['prezime'],$r['usluga'],$r['datum'],$r['brojtelefona'],$user);
            array_push($array,$termin);
            }
        return $array;
    }

    public function ubaciTermin($data,$db){
		
		if($data['ime'] === '' || $data['prezime'] === '' || $data['usluga'] === ''|| $data['datum'] === ''|| $data['brojtelefona'] === ''){
            echo '<script>alert("Nisu popunjena sva polja!")</script>';
		
		}else{
		
			$save=$db->query("INSERT INTO termin(ime,prezime,usluga,datum,brojtelefona,userid) VALUES ('".$data['ime']."','".$data['prezime']."','".$data['usluga']."','".$data['datum']."','".$data['brojtelefona']."','".$data['userid']."')") or die($db->error);
			if($save){
                echo '<script>alert("Termin je uspešno zakazan!")</script>';
			}else{
				echo '<script>alert("Greška prilikom zakazivanja termina!")</script>';
			}
		}
	}

}


?>
