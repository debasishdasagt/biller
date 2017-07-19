<?php

include 'db.php';

$db=new billerDB;
if(!db)
{
    echo $db->lastErrorMsg();
}
 else {
     echo "Database opend";
    
}
?>
