<?php 
require_once('./../helper/dataFunctions.php');
require_once('./../helper/functions.php');
if (checkRequestMethod("POST")){
deleteData($_POST);
redirect('./../index.php');}
else{
    die ("ايه اللي جايبك هنا يا صاحبي");
}
?>