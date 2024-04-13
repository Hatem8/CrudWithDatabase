<?php
 session_start();
require_once("../helper/functions.php");
require_once("../helper/validations.php");
require_once("../helper/dataFunctions.php");

 $errors= [];
 $success=[];
 if (checkRequestMethod("POST")){
 $name = $_POST['name'];
 $description = $_POST['description'];

// validations for project name
    if (!requireValue($name))  $errors[] = "Project name is required";   
//validations for description
    if (!requireValue($description)) $errors[] = "Description is required";
//validations for photo
$image = uploadFile('file');
valImage($image,$errors);

if(empty($errors)){

    $_SESSION['success']= 'Done';
    $newProject = ['name' =>$name , 'description' => $description , 'image' => $image];
    insertData($newProject);
    redirect('./../create.php');

    
}
else{
    $_SESSION['errors']= $errors;
    redirect('./../create.php');
}

}
else{
    die ("ايه اللي جايبك هنا يا صاحبي");
}

?>