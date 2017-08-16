<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include "db.php";
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sector</title>
        <link rel="stylesheet" href="CSS/components.css">
        <script type="text/javascript" src="JS/biller.js"></script>
    </head>
    <body style="margin: 0px">
        <div class="subwindowheader">All Sectors</div>
    <center>
        <br>
        <table width="90%" cellspacing="0" cellpadding="0" border="0">
            <tr>
                <th class="th1">Sector</th>
                <th class="th1">Sector-Code</th>
                <th class="th1">Status</th>
                <th class="th1">Edit</th>
            </tr>
            <?php
            $db=new billerDB;
            if(!$db)
            {
                echo $db->lastErrorMsg();
            }
            else
            {
                if(isset($_GET['s']))
                {
                    $statussql="update sectors set status='".$_GET['s']."' where id='".$_GET['id']."'";
                    $statusres=$db->query($statussql);
                    if($statusres)
                    {
                        header("location:sectors.php?inf=Status Updated");
                    }
                    else {
                        header("location:sectors.php?inf=Something went wrong while updating status");
                    }
                }
                
                
                
                    $selsql="select id,sector,sector_cd,status from sectors";
                    $selres=$db->query($selsql);
                    while($pointer=$selres ->fetchArray())
                    {
                        echo "<tr>";
                        echo "<td class='td1' align='left'>".$pointer['sector']."</td>";
                        echo "<td class='td1' align='center'>".$pointer['sector_cd']."</td>";
                        echo "<td class='td1' align='center'>";
                        if($pointer['status']=="Y")
                        {
                            $churl="sectors.php?id=".$pointer['id']."&s=N";
                            echo "<a href='".$churl."'><img src='images/toggleon.png' border='0'></a>";
                        }
                        else 
                        {
                            $churl="sectors.php?id=".$pointer['id']."&s=Y";
                            echo "<a href='".$churl."'><img src='images/toggleoff.png' border='0'></a>";
                        }
                        
                        echo "</td>";
                        echo "<td class='td1' align='center'><a href=editsector.php?id='".$pointer['id']."'><img src='images/edit.png' border=0></a></td>";
                        echo "<tr>";
                    }
            }

            ?>
        </table>
    </center>
    </body>
</html>
