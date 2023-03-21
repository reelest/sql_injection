<?php

	/**
	* Make sure you started your'e sessions!
	* You need to include su.inc.php to make SimpleUsers Work
	* After that, create an instance of SimpleUsers and your'e all set!
	*/

	session_start();
	require_once(dirname(__FILE__)."/backend/su.inc.php");

	$SimpleUsers = new SimpleUsers();
    $contents = $SimpleUsers->getUsers();
    include "templates/header.php";
?>
  	</head>
	<body>
        <h1>Users List</h1>
        <?php 
            $i = 0;
            foreach($contents as $item):
        ?>
            <li class="item">
            <h4>
            <?php
                $color = array("blue","red","purple","green")[$i++ % 4];
                $letter = substr($item["uUsername"],0,1);
                echo "<span class='letter $color'>$letter</span>";
            ?>
                <?= $item["uUsername"] ?></h4>
                <div class="right"><small>UserID: #<?= $item["userId"] ?></small></div>
                </br>This user was last seen <?= $item["uActivity"] ?>
            </li>
        <?php endforeach ?>

        <div class='pick_box'></div>
<?php include "templates/footer.php" ?>
