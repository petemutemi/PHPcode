<?php
require_once ("utility.php");

$contacts = "CREATE TABLE IF NOT EXISTS contacts("
        . "id INT(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,"
        . "name VARCHAR(150),"
        . "phone VARCHAR (100)"
        . ")";

$conn->query($contacts);