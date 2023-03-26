<?php
    
	$path = dirname(__FILE__);
    include $path."/base.php";

    class SimpleUsers extends BaseUserHandler{
        /**
        * This implementation is vulnerable to SQL Injection attack using 'OR 1=1'
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
            $sql = "SELECT userId FROM users WHERE uUsername='$username' AND SHA1(CONCAT(uSalt, '$password'))=uPassword LIMIT 1";

            $this->mysqli->multi_query($sql);
            $result = $this->mysqli->store_result();

            if($result->num_rows == 0)
				return false;

			$userId = $result->fetch_assoc()['userId'];

			$_SESSION[$this->sessionName]["userId"] = $userId;
			$this->logged_in = true;

			return $userId;
		}
    }
?>
