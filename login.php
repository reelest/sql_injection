<?php

/**
 * Make sure you started your sessions!
 * You need to include su.inc.php to make SimpleUsers Work
 * After that, create an instance of SimpleUsers and you're all set!
 */

session_start();
require_once(dirname(__FILE__)."/backend/su.inc.php");

$db = new SimpleUsers();

function contains_space($str){
    return preg_match("/\s/", $str);  
}

// Login from post data
if (isset($_POST["username"])) {

    // Make sure that data hasn't been tampered with
    $csrf = true;
    if(isset($_POST["csrf_token"]))  
        $csrf = $db->validateToken();
    if(BACKEND_IMPLEMENTATION == 3 && contains_space($_POST["username"])){
        $error = "Username must not contain spaces";
    }
    else if (!$csrf){ 
        $error = "Invalid csrf token";
    }
    else {
        // Proceed with the code to be executed if data hasn't been tampered
        // Attempt to login the user - if credentials are valid, it returns the
        // users id, otherwise (bool)false.
        $res = $db->loginUser($_POST["username"], $_POST["password"]);
        if (!$res)
            $error = "You supplied the wrong credentials.";
        else {
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
        <h1>Login</h1>

        <?php if( isset($error) ): ?>
        <p class="error">
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
                <?php echo $db->getToken(); ?>
            </p>

            <p>
                <input type="submit" name="submit" value="Log in" />
            </p>

        </form>
        <p class='center'> Don't have an account? 
        <a href="/newuser"><button>Create one now</button></a>
</p>
<?php if(BACKEND_IMPLEMENTATION < 3): ?>
Warning: This implementation is vulnerable to SQL injection.
<p style='display:block;float:left'>
    <a href="/clip">View payloads</a>
</p>
<?php endif ?>
<p style='display:block;float:right'>
    <a href="/content">View all users</a>
</p>
<div style="clear:both"></div>
</div>
    <div class="layout-2_aside">
    </div>
<?php include "templates/footer.php" ?>
