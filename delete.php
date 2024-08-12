<?php 

require_once "database.php";

$pdoStatement = $pdo->prepare("DELETE FROM todo WHERE id=".$_GET['id']);

$pdoStatement->execute();

header("Location: index.php");