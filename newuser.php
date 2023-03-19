<?php

	/**
	* Make sure you started your'e sessions!
	* You need to include su.inc.php to make SimpleUsers Work
	* After that, create an instance of SimpleUsers and your'e all set!
	*/

	session_start();
	require_once(dirname(__FILE__)."/backend/su.inc.php");

	$SimpleUsers = new SimpleUsers();

	// Validation of input
	if( isset($_POST["username"]) )
	{
		if( empty($_POST["username"]) || empty($_POST["password"]) )
			$error = "You have to choose a username and a password";
        else if($_POST["password"] != $_POST["confirmpassword"])
            $error = "Both passwords must match";
    else
    {
    	// Both fields have input - now try to create the user.
    	// If $res is (bool)false, the username is already taken.
    	// Otherwise, the user has been added, and we can redirect to some other page.
			$res = $SimpleUsers->createUser($_POST["username"], $_POST["password"]);

			if(!$res)
				$error = "Username already taken.";
			else
			{
					header("Location: users");
					exit;
			}
		}

	} // Validation end
    include "templates/header.php";
?>
    </head>
	<body class="layout-2">
        <div class="layout-2_main">
		<h1>Register as new user</h1>

		<?php if( isset($error) ): ?>
		<p class='error'>
			<?php echo $error; ?>
		</p>
		<?php endif; ?>

		<form method="post" action="">
			<p>
				<label for="username">Username:</label><br />
<?php 
    $username = "";
    if(isset($_POST["username"])) 
        $username = addslashes($_POST["username"]);
    echo '<input type="text" name="username" id="username" value="'.$username.'"/>' ?>
			</p>

			<p>
				<label for="password">Password:</label><br />
				<input type="password" name="password" id="password" />
			</p>
<p>
				<label for="confirmpassword">Confirm password:</label><br />
				<input type="password" name="confirmpassword" id="confirmpassword" />
			</p>


			<p>
				<input type="submit" name="submit" value="Create account" />
			</p>

		</form>

		<p class='center'> Already have an account? 
	    <a href="/login"><button>Log in instead</button></a>
</p>
    </div>
    <div class="layout-2_aside">
    </div>
<?php include "templates/footer.php" ?>
