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
        <link rel="stylesheet" href="CSS/components.css">
    </head>
    <body>
    <center>
        <br><br><br><br>
        <img src="images/flight.png">
        <br><br>
        <div id="loginbox">
            
            <form name="login" id="login" action="index.php" method="post">
            <table width="95%" border="0" cellpadding="1">
                <tr>
                    
                    <td><input type="text" id="uname" name="uname" placeholder="Username" class="inputboxes" style="width:100%"></td>
                </tr>
                <tr>
                    
                    <td><input type="password" id="passwd" name="passwd" placeholder="Password" class="inputboxes" style="width:100%"></td>
                </tr>
                <tr>
                    <td align="center">
                        <div class="button1" onclick="javascript:document.getElementById('login').submit()">Login</div>
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
