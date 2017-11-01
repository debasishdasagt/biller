<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include_once 'db.php';
$db= new billerDB();
if (!$db)
{
    echo $db ->lastErrorMsg();
}

 else {
     if(isset($_GET['pnr']))
     {
     $pnrselectsql="select id,name,address,age,booking_date,status,remarks from customers where pnr='".$_GET['pnr']."'"; 
     $pnrcustcount="select count(*) as CNT from customers where pnr='".$_GET['pnr']."' and status <> 'B'";
     $pnrcustallowed="select capacity from pnr where pnr_num='".$_GET['pnr']."'";
     $pnrselres=$db->query($pnrselectsql);
     $pnrcountres=$db->querySingle($pnrcustcount);
     $custallowedres=$db->querySingle($pnrcustallowed);
     
     
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
        <div class="subwindowheader">PNR Information : <?php echo $_GET['pnr']; ?></div>
        
    <center>
        <?php
        if($pnrcountres == 0)
        {
            echo ("No Customer(s) booked this PNR");
        }
        else {
            ?>
        
         <table width="90%" cellspacing="0" cellpadding="0" border="0">
            <tr>
                <th class="th1">Sector</th>
                <th class="th1">Sector-Code</th>
                <th class="th1">Status</th>
                <th class="th1">Edit</th>
            </tr>
        
         </table>
             
             
             
             <?php
        }
        if($pnrcountres <= $custallowedres)
        {
        ?>
        <br>
        <a href="addcust.php?pnr=<?php echo $_GET['pnr'];?>" class="noul"><button class="button2"> Add Customer</button></a>
    </center></body>
</html>
        <?php }}} ?>