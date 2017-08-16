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
        <title>PNR</title>
        <link rel="stylesheet" href="CSS/components.css">
        <script type="text/javascript" src="JS/jquery-latest.js"></script>
        <script src="JS/pnr.js" type="text/javascript"></script>
    </head>
    <body style="margin: 0px">
        <div class="subwindowheader">New PNR</div>
    <center>
        <br><br><br>
        <form id="sectorform" name="sectorform" method="post">
        <table width="80%" cellpadding="2" cellspacing="5" border="0">
            <tr>
                <td colspan="2"><input type="text" class="inputboxes1" placeholder="PNR" id="pnr" name="pnr"></td>
            </tr>
            <tr>
                <td><input type="text" class="inputboxes1" placeholder="Departure" id="departure" name="departure"></td>
                <td><input type="text" class="inputboxes1" placeholder="Arrival" id="arrival" name="arrival"></td>
            </tr>
            <tr>
                <td><input type="text" class="inputboxes1" placeholder="From" id="from" name="from" onkeyup=javascript:getsector('from',this.value)>
                    <div class="popuplist" id="fromlist"><li>sfhsjdf</li><li>dfsdf</li></div>
                </td>
                <td><input type="text" class="inputboxes1" placeholder="TO" id="to" name="to">
                    <div class="popuplist" id="tolist"></div>
                </td>
            </tr>
            <tr>
                <td><input type="text" class="inputboxes1" placeholder="Capacity" id="capacity" name="capacity"></td>
                <td><input type="text" class="inputboxes1" placeholder="Rate per Unit" id="rate" name="rate"></td>
            </tr>
            <tr>
                <td><input type="text" class="inputboxes1" placeholder="Total Price" id="total_price" name="total_price"></td>
                <td><input type="text" class="inputboxes1" placeholder="Remarks" id="remarks" name="remarks"></td>
            </tr>
            <tr>
                <td align="right" colspan="2" > <input type="submit" value="Save" class="button2"></td>
            </tr>
            <tr>
                <td align="center" colspan="2"><span class="info"><?php 
                
                if(isset($_GET['inf']))
                echo $_GET['inf']
                 ?>
                    </span></td>
            </tr>
        </table>
        </form>
        <br>
        
    </center>
    </body>
</html>