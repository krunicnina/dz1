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



}


?>
