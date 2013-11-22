<?php
    require_once ("../db/db.php");
    $logon_success = false; 
    
    $usr = htmlentities($_POST['usr']);
    $pwd = htmlentities($_POST['pwd']);
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $logon_success = (transformerDB::getInstance()->verifyUser($usr, $pwd));
        if ($logon_success == true) {
            session_start();
            $_SESSION['usr'] = $usr;
            header('Location: panel.php');
            exit;
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Ramin's Online Transformer Collection List - Admin login</title>
        <link href="../css/mainStyle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
            include '../include/pageheader.php';
            include '../include/admin/pagenav.php';
            ?>
            
            <h2>Admin Panel Login</h2>
            <form action="login.php" method="post">
                <label>User:</label><br/> 
                <input type="test" name="usr"><br/> 
                <label>Password:</label><br/> 
                <input type="test" name="pwd"><br />
                <input style="margin-left: 100px;" id="login" type="submit" value="Submit">
            </form>
        
            <?php
            include '../include/pagefooter.php';
            ?>
            <script src="../js/jquery-1.10.2.js"></script>
            <script>/*
                $(document).ready(function () {
                    $('#log').click(function (e) {
                        e.preventDefault();
                        var newpara = "<p>YOU PRESSSED THE BUTTON!</p>";
                        $("#content").append(newpara);
                    });
                });*/
            </script>
    </body>
</html>
