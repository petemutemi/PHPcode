<?php
session_start();
$module_active = $_SESSION["module"];
//Require Dependencies
require_once ("bin/utility.php");
require_once ("bin/schema.php");
$data = new data();
$view = "";
$url_base = "index.php?view=";

// Set URL to Content
if(isset($_GET["view"])){
    $param = $_GET["view"];
    $pos = strpos($param, "_");
    $mod = substr($param, 0, $pos);
    $page = substr($param, $pos + 1);
    $view = "modules/".$mod."/".$page.".php";
    // Page Exists
    if (!file_exists($view)){
        $view = "includes/404.php";
    }
}
else if (isset ($_SESSION["module"])){
    $view = "modules/".$_SESSION["module"]."/".$_SESSION["module"].".php";
}
else{
    $view = "modules/content/home.php";
}

// Load Content 
echo '<h1 class="div_title">Module: Module Title</h1>';
require_once ($view);