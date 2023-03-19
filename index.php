<?php

	/**
	* Make sure you started your'e sessions!
	* You need to include su.inc.php to make SimpleUsers Work
	* After that, create an instance of SimpleUsers and your'e all set!
	*/

	session_start();
	require_once(dirname(__FILE__)."/backend/su.inc.php");

	$SimpleUsers = new SimpleUsers();

	// This is a simple way of validating if a user is logged in or not.
	// If the user is logged in, the value is (bool)true - otherwise (bool)false.
	if( !$SimpleUsers->logged_in )
	{
		header("Location: login");
		exit;
	}

	// If the user is logged in, we can safely proceed.
	$users = $SimpleUsers->getUsers();
    include "templates/header.php";
?>
  	</head>
	<body>

		<h1>User administration</h1>
		<table cellpadding="0" cellspacing="0" border="1">
			<thead>
				<tr>
					<th>Username</th>
					<th>Last activity</th>
					<th>Created</th>
					<th></th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="4" class="right">
						<a href="newuser.php">Create new user</a> | <a href="logout.php">Logout</a>
					</td>
				</tr>
			</tfoot>
			<tbody>
				<?php foreach( $users as $user ): ?>
				<tr>
					<td><?php echo $user["uUsername"]; ?></td>
					<td class="right"><?php echo $user["uActivity"]; ?></td>
					<td class="right"><?php echo $user["uCreated"]; ?></td>
					<td class="right"><a href="deleteuser.php?userId=<?php echo $user["userId"]; ?>">Delete</a> | <a href="userinfo.php?userId=<?php echo $user["userId"]; ?>">User info</a> | <a href="changepassword.php?userId=<?php echo $user["userId"]; ?>">Change password</a></td>
				</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
<?php include "templates/footer.php" ?>
