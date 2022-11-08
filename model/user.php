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

}

?>
