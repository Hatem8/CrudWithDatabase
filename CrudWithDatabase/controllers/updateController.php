<?php 
require_once('./../helper/dataFunctions.php');
require_once('./../helper/functions.php');
require_once('./../helper/validations.php');
$errors=[];

$oldCat = readOneCat($_POST['id']);
$image = empty($_FILES['file']['name']) ? $oldCat['image'] : uploadFile('file');
//validations for photo
valImage($image,$errors);
if(empty($errors)){
    if ($oldCat['image']!=$image){
        deleteFile($oldCat['image']);
    }
    $updatedCat = ['id'=> $_POST['id'],'name' =>$_POST['name'] , 'description' => $_POST['description'] , 'image' =>$image];
    updateData($updatedCat);
    redirect('./../index.php');
}
else{
    $_SESSION['errors']= $errors;
    redirect('./../index.php');
}


?>