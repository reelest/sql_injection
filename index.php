<?php

	/**
	* Make sure you started your'e sessions!
	* You need to include su.inc.php to make SimpleUsers Work
	* After that, create an instance of SimpleUsers and your'e all set!
	*/

	session_start();
	require_once(dirname(__FILE__)."/backend/su.inc.php");

	$db = new SimpleUsers();

	// This is a simple way of validating if a user is logged in or not.
	// If the user is logged in, the value is (bool)true - otherwise (bool)false.
	if( !$db->logged_in )
	{
		header("Location: login");
		exit;
	}
	// If the user is logged in, we can safely proceed.

    if(isset($_POST["secret"])){
        $db->setInfo("uUserSecret", $_POST["secret"]);
    }

    $user = $db->getSingleUser();
    $secret = $db->getInfo("uUserSecret");
    include "templates/header.php";
?>
  	</head>
	<body style="margin:auto;padding:16px;max-width:600px">
<h1>Dashboard</h1>
    <p>Welcome <?= htmlentities($user["uUsername"]) ?>,
</p>    
    <form method="post" action="">  
    <p>  
<label for="secret">Your secret information is </label>
    <?= '<input type="text" id="secret" name="secret" value="'.addslashes($secret).'" />'; ?>
    </p>
<p>   
 <input type="submit" name="updateSecret" id="updateSecret"/>
</p>
    </form>
<p><i>This information is to be kept secret and only accessible to logged in users</i></p>
<?php include "templates/footer.php" ?>
