<?php

define("HOST", "localhost");
define("DB", "forum");
define("USER", "root");
define("PASSWORD", "");

try{
$conn = new PDO("mysql:host=".HOST.";dbname=".DB."",USER,PASSWORD);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $error){
  echo $error->getMessage();
}
?>
