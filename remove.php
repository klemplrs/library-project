<?php

// Remove an element from the table, targetting the ID

require "index.php";

$id = $_GET['idd']; 

$objetPDO = new PDO("mysql:host=localhost;dbname=mylibrary","root","");

$sql = "DELETE FROM book WHERE id=?";

$removeAction = $objetPDO->prepare($sql);
$removeAction->bindValue(1, $id, PDO::PARAM_INT);
$removeAction->execute();