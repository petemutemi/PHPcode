<?php 
    session_start(); 
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <!-- Meta -->
        <meta charset="UTF-8">
        <title>Pagination Module</title>
        <!-- CSS -->        
        <link href="scripts/css/template.css" rel="stylesheet" type="text/css"/>
        <link href="scripts/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="scripts/css/modules.css" rel="stylesheet" type="text/css"/>       
        <link href="scripts/css/controls.css" rel="stylesheet" type="text/css"/>
        <!-- JS -->
        <script src="scripts/js/modules.js" type="text/javascript"></script>
        <script src="scripts/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="wrap">
            <div id="menu"><?php require_once ("includes/menu.php"); ?></div>
            <div id="content"><?php require_once ("controller.php"); ?></div>
        </div>
    </body>
</html>