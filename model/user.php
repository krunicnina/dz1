<?php 
class User
{
    public $userid;
    public $email;
    public $password;

    public function __construct($userid = null, $email = null, $password = null)
    {
        $this->userid = $userid;
        $this->email = $email;
        $this->password = $password;
    }
    public static function logIn($user, mysqli $conn)
    {
        $email = $user->email;
        $password = $user->password;
        $query = "SELECT * FROM user WHERE email='$user->email' and password='$user->password'";
      
        return $conn->query($query);
    }
    public function ubaciUser($data,$db){
		
		if($data['email'] === '' || $data['password'] === '' ){
            echo '<script>alert("Polja ne smeju biti prazna!")</script>';
		
		}else{
		
			$save=$db->query("INSERT INTO user(email,password) VALUES ('".$data['email']."','".$data['password']."')") or die($db->error);
			if($save){
				
                echo '<script>alert("Uspešno ste se registrovali!")</script>';
			}else{
                echo '<script>alert("Greška prilikom registrovanja! Molimo Vas, pokušajte ponovo!")</script>';
			}
		}
	}




public static function vratiSve($db){
    $query="SELECT * FROM user";
    $result=$db->query($query);
    $array=[];
    while($r = $result->fetch_assoc()){
        $user=new User($r['userid'],$r['email'],$r['password']);
        array_push($array,$user);
        }
    return $array;
}
    
}

?>
