<?php
    session_start();  
    if (!isset($_SESSION['usr'])) {
        header('Location: login.php');
        exit;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Ramin's Online Transformer Collection List - Edit Lists</title>
        <link href="../css/mainStyle.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php
            include '../include/pageheader.php';
            include '../include/admin/pagenav.php';
            ?>
        <!-- stuff goes here -->
        
        <?php
            include '../include/pagefooter.php';
            ?>
        <script src="../js/jquery-1.10.2.js"></script>
    </body>
</html>
