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
    if(isset($_POST['pnr']))
    {
        $inssql="Insert into pnr(pnr_num,departure,arrival,sector_from,sector_to,capacity,total_price,rate_per_unit,remarks,flight_number,selling_price,status) "
                . "values('".$_POST['pnr']."','"
                .$_POST['departure']."','"
                .$_POST['arrival']."','"
                .$_POST['from']."','"
                .$_POST['to']."','"
                .$_POST['capacity']."','"
                .$_POST['total_price']."','"
                .$_POST['rate']."','"
                .$_POST['remarks']."','"
                .$_POST['flight_number']."','"
                .$_POST['sell_price']."',"
                ."'Y')";
        
        echo $inssql;
        $insres=$db->query($inssql);
        if($insres)
        {
            header("location: pnr.php?inf=PNR Saved Succesfully"); 
        }
        else{
           
           header("location: pnr.php?inf=Something Went Wrong: Error= ".$inssql); 
        }
    }
}

?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>PNR</title>
        <link rel="stylesheet" href="CSS/components.css">
        <link rel="stylesheet" href="CSS/jquery.datetimepicker.css">
        <script type="text/javascript" src="JS/jquery-latest.js"></script>
        <script src="JS/pnr.js" type="text/javascript"></script>
        <script type="text/javascript" src="JS/jquery.datetimepicker.full.js"></script>
    </head>
    <body style="margin: 0px">
        <div class="subwindowheader">New PNR</div>
    <center>
        <br>
        <form id="sectorform" name="sectorform" method="post">
        <table width="80%" cellpadding="2" cellspacing="5" border="0">
            <tr>
                <td colspan="2"><input type="text" class="inputboxes1" placeholder="PNR Number" id="pnr" name="pnr" autocomplete="off"></td>
            </tr>
            <tr>
                <td><input type="text" class="inputboxes1" placeholder="Departure" id="departure" name="departure" autocomplete="off"></td>
                <td><input type="text" class="inputboxes1" placeholder="Arrival" id="arrival" name="arrival" autocomplete="off"></td>
            </tr>
            <tr>
                <td><input type="text" class="inputboxes1" placeholder="From" id="from" name="from" onkeyup=javascript:getsector('fromlist',this.value,'from') autocomplete="off">
                    <div class="popuplist" id="fromlist"></div>
                </td>
                <td><input type="text" class="inputboxes1" placeholder="TO" id="to" name="to" onkeyup=javascript:getsector('tolist',this.value,'to')  autocomplete="off">
                    <div class="popuplist" id="tolist"></div>
                </td>
            </tr>
            <tr>
                <td><input type="number" class="inputboxes1" placeholder="Capacity" id="capacity" name="capacity" onkeyup="javascript:calculate(this.id)"  autocomplete="off"></td>
                <td><input type="number" class="inputboxes1" placeholder="Total Price" id="total_price" name="total_price" onkeyup="javascript:calculate(this.id)"  autocomplete="off"></td>
            </tr>
            <tr>
                <td><input type="number" class="inputboxes1" placeholder="Rate per Unit" id="rate" name="rate"  autocomplete="off"></td>
                <td><input type="number" class="inputboxes1" placeholder="Selling Price" id="sell_price" name="sell_price" autocomplete="off"></td>
            </tr>
            <tr>
                <td><input type="text" class="inputboxes1" placeholder="Flight Number" id="flight_number" name="flight_number" autocomplete="off"></td>
                <td><input type="text" class="inputboxes1" placeholder="Remarks" id="remarks" name="remarks" autocomplete="off"></td>
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
    <script type="text/javascript">
        
        
    $('#departure').datetimepicker({
    dayOfWeekStart : 1,
    lang:'en',
    step:5,
    format: 'Y-m-d H:i'
    });
    
    $('#arrival').datetimepicker({
    dayOfWeekStart : 1,
    lang:'en',
    step:5,
    format: 'Y-m-d H:i'
    });

    
    </script>
</html>