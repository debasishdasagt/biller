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
     $pnrselectsql="select id,name,contact_number,age,booking_date,status,remarks,paid_amount from customers where pnr='".$_GET['pnr']."'"; 
     $pnrinfosql="select * from pnr where pnr_num='".$_GET['pnr']."'";
     $pnrcustcount="select count(*) as CNT from customers where pnr='".$_GET['pnr']."' and status <> 'B'";
     $pnrcustallowed="select capacity from pnr where pnr_num='".$_GET['pnr']."'";
     $pnrselres=$db->query($pnrselectsql);
     $pnrcountres=$db->querySingle($pnrcustcount);
     $custallowedres=$db->querySingle($pnrcustallowed);
     $pnrinfores=$db->query($pnrinfosql);
     $pnrpointer=$pnrinfores->fetchArray();
     
     
     if(isset($_GET['s']))
                {
                    $statussql="update pnr set status='".$_GET['s']."' where id='".$_GET['id']."'";
                    $statusres=$db->query($statussql);
                    if($statusres)
                    {
                        header("location:pnrinfo.php?inf=Status Updated&pnr=".$_GET['pnr']);
                    }
                    else {
                        header("location:pnrinfo.php?inf=Something went wrong while updating status&pnr=".$_GET['pnr']);
                    }
                }
     
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
        <style>
            body
            {
                margin: 0px;
                font-family: 'Open Sans Condensed', sans-serif;
                font-size: 12px;
                color: black;
            }
        </style>
    </head>
    <body style="">
        <div class="subwindowheader">PNR Information : <?php echo $_GET['pnr']; ?></div>
        
    <center>
        
        <table cellpadding="7" cellspacing="3" border="0">
            <tr>
                <td class="td2">Departure: <span class="lbl1"> <?php echo $pnrpointer['departure']." (".$pnrpointer['sector_from'].")" ?></span></td>
                <td class="td2">Arrival: <span class="lbl1"><?php echo $pnrpointer['arrival']." (".$pnrpointer['sector_to'].")" ?></span></td>
            </tr>
            <tr>
                <td class="td2">Capacity: <span class="lbl1"><?php echo $pnrpointer['capacity'] ?></span></td>
                <td class="td2">Rate Per Unit: <span class="lbl1"><?php echo $pnrpointer['rate_per_unit'] ?></span></td>
            </tr>
            <tr>
                <td class="td2">Total Price: <span class="lbl1"><?php echo $pnrpointer['total_price'] ?></span></td>
                <td class="td2">Selling Price: <span class="lbl1"><?php echo $pnrpointer['selling_price']." / Unit" ?></span></td>
            </tr>
            <tr>
                <td class="td2">Flight Number: <span class="lbl1"><?php echo $pnrpointer['flight_number'] ?></span></td>
                <td class="td2">Remarks: <span class="lbl1"><?php echo $pnrpointer['remarks'] ?></span></td>
            </tr>
            <tr>
<<<<<<< HEAD
                <td class="td2">Status: <span class="lbl1"><?php echo $pnrpointer['flight_number'] ?></span></td>
                <td class="td2">Remarks: <span class="lbl1"><?php echo $pnrpointer['remarks'] ?></span></td>
=======
                <td class="td2" align="center"><span class="lbl1" style="vertical-align: middle">
                    <?php
                                if($pnrpointer['status']=="Y")
                        {
                            $churl="pnrinfo.php?id=".$pnrpointer['id']."&s=N&pnr=".$_GET['pnr'];
                            echo "<a href='".$churl."'><img src='images/active.png' border='0'></a>";
                        }
                        else 
                        {
                            $churl="pnrinfo.php?id=".$pnrpointer['id']."&s=Y&pnr=".$_GET['pnr'];
                            echo "<a href='".$churl."'><img src='images/inactive.png' border='0'></a>";
                        }
                        ?>
                    </span></td>
                
>>>>>>> ce124767f60a24373dd822d5a43ec377cf4dd690
            </tr>
        </table>
        <div style="width:90%; text-align:center; font-size: 24px; font-weight: bold; color: red; margin: 10px">
        <?php
        if($pnrcountres == 0)
        {
            echo ("No Customer(s) booked this PNR");
        }
        else {
            ?></div>
        <div style="width:90%; text-align:left; margin-top: 5px">Registered Customers are: </div>
         <table width="90%" cellspacing="0" cellpadding="0" border="0">
            <tr>
                <th class="th1">Booked On</th>
                <th class="th1">Name</th>
                <th class="th1">Amount Paid</th>
                <th class="th1">Age</th>
                <th class="th1">Contact Num.</th>
                <th class="th1">Remarks</th>
            </tr>
            <?php
            if($pnrselres)
            {
                while($pointer=$pnrselres->fetchArray())
                {
                    echo "<tr>";
                    echo "<td class='td1' align='center'>".$pointer['booking_date']."</td>";
                    echo "<td class='td1' align='center'>".$pointer['name']."</td>";
                    echo "<td class='td1' align='center'>".$pointer['paid_amount']."</td>";
                    echo "<td class='td1' align='center'>".$pointer['age']."</td>";
                    echo "<td class='td1' align='center'>".$pointer['contact_number']."</td>";
                    echo "<td class='td1' align='center'>".$pointer['remarks']."</td>";
                    echo "</tr>";
                }
            }
            ?>
        
         </table>
             
             
             
             <?php
        }
        if($pnrcountres < $custallowedres)
        {
        ?>
        <br>
        <a href="addcust.php?pnr=<?php echo $_GET['pnr'];?>" class="noul"><button class="button2"> Add Customer</button></a>
    </center></body>
</html>
        <?php }}} ?>