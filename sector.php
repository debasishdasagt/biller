<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php

include 'db.php';

$db=new billerDB;
if(!$db)
{
    echo $db->lastErrorMsg();
}
else
{
    if(isset($_POST['sector']))
    {
        $inssql="Insert into sectors(sector,sector_cd,status) values('".$_POST['sector']."','".$_POST['sectorcode']."','Y')";
        $insres=$db->query($inssql);
        if($insres)
        {
            header("location: sector.php?inf=Sector Added Succesfully"); 
        }
        else{
            header("location: sector.php?inf=Something Went Wrong");
        }
    }
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Sector</title>
        <link rel="stylesheet" href="CSS/components.css">
    </head>
    <body style="margin: 0px">
        <div class="subwindowheader">Sectors</div>
    <center>
        <br><br><br>
        <form id="sectorform" name="sectorform" method="post">
        <table width="80%" cellpadding="2" cellspacing="0" border="0">
            <tr>
                <td><input type="text" class="inputboxes1" placeholder="Sector" id="secotr" name="sector"></td>
            </tr>
            <tr>
                <td><input type="text" class="inputboxes1" placeholder="Sector Code" id="sectorcode" name="sectorcode"></td>
            </tr>
            <tr>
                <td align="right"> <input type="submit" value="Add Sector" class="button2"></td>
            </tr>
            <tr>
                <td align="center"><span class="info"><?php 
                
                if(isset($_GET['inf']))
                echo $_GET['inf']
                 ?>
                    </span></td>
            </tr>
        </table>
        </form>
        <br>
        <table width="90%" cellspacing="0" cellpadding="0" border="0">
            <tr>
                <th class="th1">Sector</th>
                <th class="th1">Sector-Code</th>
                <th class="th1">Status</th>
                <th class="th1">Edit</th>
            </tr>
            <?php
            
                if(isset($_GET['s']))
                {
                    $statussql="update sectors set status='".$_GET['s']."' where id='".$_GET['id']."'";
                    $statusres=$db->query($statussql);
                    if($statusres)
                    {
                        header("location:sector.php?inf=Status Updated");
                    }
                    else {
                        header("location:sector.php?inf=Something went wrong while updating status");
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
                            $churl="sector.php?id=".$pointer['id']."&s=N";
                            echo "<a href='".$churl."'><img src='images/toggleon.png' border='0'></a>";
                        }
                        else 
                        {
                            $churl="sector.php?id=".$pointer['id']."&s=Y";
                            echo "<a href='".$churl."'><img src='images/toggleoff.png' border='0'></a>";
                        }
                        
                        echo "</td>";
                        echo "<td class='td1' align='center'><a href=editsector.php?id='".$pointer['id']."'><img src='images/edit.png' border=0></a></td>";
                        echo "<tr>";
                    }
            

            ?>
        </table>
    </center>
    </body>
</html>