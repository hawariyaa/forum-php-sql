<?php

session_start();
session_unset(); //usset the variables
session_destroy();

header("location: http://localhost/forum/");

?>
