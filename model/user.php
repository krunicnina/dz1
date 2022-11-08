<?php 
class User
{
    public $userid;
    public $username;
    public $password;

    public function __construct($userid = null, $email = null, $password = null)
    {
        $this->userid = $userid;
        $this->email = $email;
        $this->password = $password;
    }

}

?>
