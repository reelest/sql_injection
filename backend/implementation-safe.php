<?php

$path = dirname(__FILE__);
include $path."/base.php";

class SimpleUsers extends BaseUserHandler{
    /**
     * Pairs up username and password as registrered in the database.
     * If the username and password is correct, it will return (int)user id of
     * the user which credentials has been passed and set the session, for
     *	use by the user validating.
     *
     * @param	username	The username
     * @param	password	The password
     * @return	The (int)user id or (bool)false
     */

    public function loginUser( $username, $password )
    {
        $sql = "SELECT userId FROM users WHERE uUsername=? AND SHA1(CONCAT(uSalt, ?))=uPassword LIMIT 1";
        if( !$this->stmt = $this->mysqli->prepare($sql) )
            throw new Exception("MySQL Prepare statement failed: ".$this->mysqli->error);

        $this->stmt->bind_param("ss", $username, $password);
        $this->stmt->execute();
        $this->stmt->store_result();

        if( $this->stmt->num_rows == 0)
            return false;

        $this->stmt->bind_result($userId);
        $this->stmt->fetch();

        $_SESSION[$this->sessionName]["userId"] = $userId;
        $this->logged_in = true;

        return $userId;
    }
}
?>
