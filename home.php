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

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="CSS/pagestyle.css">
        <link rel="stylesheet" type="text/css" href="CSS/featherlight.css">
        <link rel="stylesheet" type="text/css" href="CSS/components.css">

        
        
        <script type="text/javascript" src="JS/jquery-latest.js"></script>
        <script type="text/javascript" src="JS/featherlight.js" charset="utf-8"></script>
       
        
     

	</style>
        
    </head>
    <body>
    <center>
        <table width="100%" cellpadding="0" cellspacing="0" border="0">
            <tr>
                <td valign="bottom" align="center"><div id="topbarbg"></div>
                
                    <table border="0" width="900">
                        <tr>
                            <td valign="bottom">
                                <table border="0">
                                    <tr>
                                        
                                        <td><a class="noul" href="pnr.php" data-featherlight="iframe"><div class="btn2">PNR</div></a></td>
                                        <td><a class="noul" href="sector.php" data-featherlight="iframe"><div class="btn2">Sectors</div></a></td>
                                    </tr>
                                </table>
                                
                                
                            </td>
                            <td align="right"><div id="black_flight"></div></td>
                        </tr>
                    </table>
                
                </td>
            </tr>
            <tr>
                <td align="center">
                    
                    <div class="tbl-header">
                        <table class="pnrtable" width="100%" cellpadding="0" cellspacing="0" >
                        <tr>
                            <th class="pnrth">Departure</th>
                            <th class="pnrth">Arrival</th>
                            <th class="pnrth">From</th>
                            <th class="pnrth">to</th>
                            <th class="pnrth">Available</th>
                            <th class="pnrth">PNR Number</th>
                            <th class="pnrth">PNR Info.</th>
                        </tr>
                    </table>
                    </div>
                    <div class="tbl-content">
                        <table width="100%" cellspacing="0" cellpadding="0" id="pnrtable">
                            
                            <tbody>
                            <?php
                            $selsql="select pnr_num,departure,arrival,sector_from, sector_to,(select capacity - count(*) from customers where pnr=pnr_num)||' / '||capacity as capa from pnr where status='Y'";
                    $selres=$db->query($selsql);
                    while($pointer=$selres ->fetchArray())
                    {
                        echo "<tr>";
                        echo "<td class='tbl-data'>".$pointer['departure']."</td>";
                        echo "<td class='tbl-data'>".$pointer['arrival']."</td>";
                        echo "<td class='tbl-data'>".$pointer['sector_from']."</td>";
                        echo "<td class='tbl-data'>".$pointer['sector_to']."</td>";
                        echo "<td class='tbl-data'>".$pointer['capa']."</td>";
                        echo "<td class='tbl-data'>".$pointer['pnr_num']."</td>";
                        echo "<td class='tbl-data'><a href='pnrinfo.php?pnr=".$pointer['pnr_num']."' data-featherlight='iframe'><img src='images/pnrinfo.png' class='infobutton' ></a></td>";
                        echo "</tr>";
                    
                    }
                            ?>
                            </tbody>
                        </table>
                        
                    </div>
                    
                    
                    
                    
                </td>
            </tr>
        </table>
        <span class="txt">Show inactive PNRs.</span>
    </center>
    </body>
</html>
