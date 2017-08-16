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
    if(isset($_GET['id']))
    {
    $selsql="select sector,sector_cd from sectors where id=".$_GET['id'];
        $selres=$db->query($selsql);
        $pointer=$selres->fetchArray();
        
    }
    
    if(isset($_POST['sector']))
    {
        $updsql="update sectors set sector='".$_POST['sector']."',sector_cd='".$_POST['sectorcode']."' where id=".$_GET['id'];
        $updres=$db->query($updsql);
        if($updres)
        {
            header("location: sector.php?inf=Sector edited successfully.");
        }
        else {
            header("location: editsector.php?inf=Something went wrong while editing sector.");
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
        <div class="subwindowheader">Edit Sector</div>
    <center>
        <br><br><br>
        <form id="sectorform" name="sectorform" method="post">
        <table width="80%" cellpadding="2" cellspacing="0" border="0">
            <tr>
                <td><input type="text" class="inputboxes1" placeholder="Sector" id="secotr" name="sector" value="<?php echo $pointer['sector'] ?>"></td>
            </tr>
            <tr>
                <td><input type="text" class="inputboxes1" placeholder="Sector Code" id="sectorcode" name="sectorcode" value="<?php echo $pointer['sector_cd'] ?>"></td>
            </tr>
            <tr>
                <td align="right"> <input type="submit" value="Update" class="button2"></td>
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
    </center>
    </body>
</html>