<?php

include 'db.php';

$db=new billerDB;
if(!$db)
{
    echo $db->lastErrorMsg();
}
 else {?>

<html>
    <head>
        <link rel="stylesheet" href="CSS/style.css">
    </head>
    <body>
    <center>
        <br><br><br><br><br><br>
        <img src="images/flight.png">
        <br><br>
        <div id="loginbox">
            <br>
            <table width="80%" border="0" cellpadding="5">
                <tr>
                    <td>Username</td>
                    <td><input type="text" id="uname"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" id="passwd"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <div class="btn1">Login</div>
                    </td>
                </tr>
            </table>
        </div>
    </center>
    </body>
</html>





    
<?php }?>
