<?php

	define("BACKEND_IMPLEMENTATION", 1);

    switch(BACKEND_IMPLEMENTATION){
        case 1:
        /* In-band SQL Injection attacks
         * This backend is vulnerable to all sql injection attacks such as:
         * 1. Legally Incorrect queries
         * 2. Tautology queries
         * 3. UNION queries
         * 4. Piggy-backed queries
         * 5. Stored Procedure queries
         * */
            include($path."/implementation-unsafe.php");
            break;
        case 2:
        /* 6. Blind SQL Injection attacks
            - This backend is vulnerable to blind sql injection attacks but reduces impact of legally incorrect queries by not showing errors.
         */
            error_reporting(0);
            include($path."/implementation-unsafe.php");
            break;

        case 3:
            /* 3 - This backend is vulnerable to character encoding based sql injection attacks. */
            include($path."/implementation-unsafe.php");
            break;
        
        /* Reference implementation */
        case 4:
            /* 0 - This backend is not vulnerable to sql injection because it uses prepared statements.*/
            include($path."/implementation-safe.php");
            break;

    }

?>
