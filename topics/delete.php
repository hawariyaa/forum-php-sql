<?php require "includes/header.php"; ?>
<?php require "config/config.php"; ?>

<?php

 if(isset($_GET['id'])){
   $id = $_GET['id'];


  $delete = $conn->query("DELETE FROM topic WHERE id = '$id'");
  $delete->execute();

  header("location: ".URL."");
}
?>
