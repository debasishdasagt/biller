<?php

include 'db.php';

$db=new billerDB;
if(!$db)
{
    echo $db->lastErrorMsg();
}
 else {
     
     if(isset($_POST['uname']))
     {
         if(isset($_POST['passwd']))
         {
             $loginsql="select count(*) from users where usern='".$_POST['uname']."' and passwd='".$_POST['passwd']."';";
             $loginres=$db->querySingle($loginsql);
             if($loginres >> 0)
             {
                header("location: home.php"); 
             }
             else
             {
                 header("location: index.php?e=Username or password is incorrect");
             }
             
         }
         else
         {
             header("location: index.php?e=Please enter a password");
         }
     }
     
     
     
     ?>

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
            <form name="login" id="login" action="index.php" method="post">
            <table width="80%" border="0" cellpadding="5">
                <tr>
                    <td>Username</td>
                    <td><input type="text" id="uname" name="uname"></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" id="passwd" name="passwd"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <div class="btn1" onclick="javascript:document.getElementById('login').submit()">Login</div>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <?php
                        if(isset($_GET['e']))
                        {
                            echo "<font color=red><b>".$_GET['e']."</b></font>";
                        }
                        ?>
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </center>
    </body>
</html>





    
<?php }?>
