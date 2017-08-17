<?php

include "db.php";

$db= new billerDB();

if(!$db)
{
    echo $db->lastErrorMsg();
}
else
{
    if(isset($_GET['data']))
    {
        $getsecsql="select sector || '-' || sector_cd as SE from sectors where SE like '%".$_GET['data']."%' and status='Y'";
        $getsecres= $db->query($getsecsql);
        while($pointer=$getsecres->fetchArray())
        {
            echo "<li onclick=javascript:setsector('".$_GET['id2']."','".$pointer['SE']."','".$_GET['id']."') >".$pointer['SE']."</li>";
        }
    }
    else 
        {
        echo "NA";
        }
}
