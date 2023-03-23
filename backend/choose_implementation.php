<?php

	define("BACKEND_IMPLEMENTATION", 1);

    switch(BACKEND_IMPLEMENTATION){
        /* In-band SQL Injection attacks */
        case 1:
            /* 1 - This backend is vulnerable to basic sql injection attacks.*/
            include($path."/implementation-unsafe.php");
            break;
        case 2:
            error_reporting(0);
            /* 2 - This backend is vulnerable to sql injection attacks using " and client-side scripting */
            include($path."/implementation-unsafe.php");
            break;


        /* Blind SQL Injection attacks */
        case 3:
            /* 3 - This backend is vulnerable to content-based or boolean-based sql attacks */
            include($path."/implementation-unsafe.php");
            break;
        case 4:
            /* 4 - This backend is vulnerable to time-based sql injection attacks */
            include($path."/implementation-time.php");
            break;
        
        /* Reference implementation */
        case 5:
            /* 0 - This backend is not vulnerable to sql injection*/
            include($path."/implementation-safe.php");
            break;

    }

?>