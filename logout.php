<?php
require 'autoloader.php';



$session = new SessionClass();
$session -> create();
$session -> destroy();

//redirect to index page
header('Location: index.php');
exit();