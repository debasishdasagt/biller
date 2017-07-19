<?php

include 'db.php';

$db=new billerDB;
if(!db)
{
    echo $db->lastErrorMsg();
}
 else {?>

<html>
    <head>
        <link rel="stylesheet" href="CSS/style.css">
    </head>
    <body>
        test
    </body>
</html>





    
<?php }?>
