<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include 'db.php';

$inf="";
$db= new billerDB();

if(!$db)
{
    $inf=$db->lastErrorMsg();
}
else
{
    if(isset($_POST['c_mob']))
    {
        $csql="insert into customers(name,address,id_type,id_number,dob,age,pnr,booking_date,payment_mode,paid_amount,status,remarks,contact_number,email)"
                ."values('"
                .$_POST['c_name']."','"
                .$_POST['c_address']."','"
                .$_POST['c_idtype']."','"
                .$_POST['c_idnumber']."','"
                .$_POST['c_dob']."','"
                .$_POST['c_age']."','"
                .$_GET['pnr']."','"
                .$_POST['c_date']."','"
                .$_POST['c_paymode']."','"
                .$_POST['c_amount']."','Y','"
                .$_POST['c_remarks']."','"
                .$_POST['c_mob']."','"
                .$_POST['c_email']."')";
         $custres=$db->query($csql);
         if($custres)
         {
             $inf="Customer Record Saved";
         }
         else
         {
             $inf="Something Went wrong while saving Customer data";
         }
                
    }
}
echo $inf;
?>

<html>
        <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="CSS/components.css">
        <link rel="stylesheet" href="CSS/jquery.datetimepicker.css">
        <link rel="stylesheet" type="text/css" href="CSS/featherlight.css">
        
        
        <script type="text/javascript" src="JS/jquery-latest.js"></script>
        <script type="text/javascript" src="JS/featherlight.js" charset="utf-8"></script>
        <script src="JS/pnr.js" type="text/javascript"></script>
        <script type="text/javascript" src="JS/jquery.datetimepicker.full.js"></script>
        
        <title>PNR Information</title>
    </head>
    <body style="margin: 0px">
        
        <div class="subwindowheader">
            <table cellpadding="5" border="0">
                <tr>
                    <td><img src="images/back.png" class="infobutton" style="width: 20px; height: 20px" onclick="javascript:history.go(-1)"></td>
                    <td>New Customer</td>
                </tr>
            </table></div>
    <center>
        <form id="sectorform" name="sectorform" method="post">
        <table width="80%" cellpadding="2" cellspacing="0" border="0">
            <tr>
                <td><input type="text" class="inputboxes1" placeholder="Customer Name" id="c_name" name="c_name" autocomplete="off"></td>
                <td><input type="text" class="inputboxes1" placeholder="Address" id="c_address" name="c_address" autocomplete="off"></td>
            </tr>
            <tr>
                <td><input type="text" class="inputboxes1" placeholder="ID Sumitted" id="c_idtype" name="c_idtype" autocomplete="off"></td>
                <td><input type="text" class="inputboxes1" placeholder="ID Number" id="c_idnumber" name="c_idnumber" autocomplete="off"></td>
            </tr>
            <tr>
                <td><input type="text" class="inputboxes1" placeholder="Date of Birth" id="c_dob" name="c_dob" autocomplete="off" onblur="javascript:getage(this.value.toString())"></td>
                <td><input type="text" class="inputboxes1" placeholder="Age" id="c_age" name="c_age" autocomplete="off"></td>
            </tr>
            <tr>
                <td><input type="text" class="inputboxes1" placeholder="Amount Paid" id="c_amount" name="c_amount" autocomplete="off"></td>
                <td><input type="text" class="inputboxes1" placeholder="Payment Mode" id="c_paymode" name="c_paymode" autocomplete="off"></td>
            </tr>
            <tr>
                <td><input type="text" class="inputboxes1" placeholder="Contact Number" id="c_mob" name="c_mob" autocomplete="off"></td>
                <td><input type="text" class="inputboxes1" placeholder="E-Mail" id="c_email" name="c_email" autocomplete="off"></td>
            </tr>
            <tr>
                <td><input type="text" class="inputboxes1" placeholder="Booked on" id="c_date" name="c_date" autocomplete="off"></td>
                <td><input type="text" class="inputboxes1" placeholder="Remarks" id="c_remarks" name="c_remarks"autocomplete="off"></td>
            </tr>
            <tr>
                <td align="center" colspan="2"> <input type="submit" value="Save Customer" class="button2"></td>
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
        <?php
        // put your code here
        ?>
    </center>
    </body>
    <script type="text/javascript">
    $('#c_dob').datetimepicker({
    dayOfWeekStart : 1,
    lang:'en',
    step:5,
    format: 'Y-m-d',
    timepicker: false,
    closeOnDateSelect: true,
    startDate:'1990/1/1'
    });
    
    $('#c_date').datetimepicker({
    dayOfWeekStart : 1,
    lang:'en',
    step:5,
    format: 'Y-m-d H:i',
    });
        </script>
</html>
