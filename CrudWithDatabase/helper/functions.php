<?php 
if(session_id() == '') {
    session_start();
}
function redirect(string $url): void
{
    header("Location: $url");
    exit();
}

function checkRequestMethod( $method ) : bool{
    return $_SERVER['REQUEST_METHOD'] === $method;
}

function getSession($key){
    $value = $_SESSION[$key];
    unset($_SESSION[$key]);
    return $value;
    
}
function uploadFile($inputFile){
    $file = $_FILES[$inputFile];
    $f_tmp_name = $file['tmp_name'];
    $f_error = $file['error'];
    $f_size = $file['size'];

    if ($file['name'] != '')
    {
    $ext = pathinfo($file['name'],PATHINFO_EXTENSION);
    $allowed_ext = array("png","jpg","jpeg","gif","PNG");
    if (!in_array($ext, $allowed_ext)){    
       return 1;
    }
    else if($f_error !== 0){ 
        return 2;
    }
    else if($f_size >1000000){
        return 3;
    }
    else {
        $newName= uniqid().".".$ext;
        $destnation= './../uploads/'.$newName;
        move_uploaded_file($f_tmp_name,$destnation);
        return $newName;
    }
   
    }
    else{
    return 4;
    }

}



?>