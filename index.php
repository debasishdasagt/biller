<?php

include 'db.php';

$db=new billerDB;
if(!$db)
{
    echo $db->lastErrorMsg();
}
 else {?>

<html>
    <head>
        <link rel="stylesheet" href="CSS/style.css">
    </head>
    <body>
    <center>
        <br><br><br><br><br><br>
        <img src="images/flight.png">
        <br><br>
        <div id="loginbox"></div>
    </center>
    </body>
</html>





    
<?php }?>
