<?php 
function databaseConnect(){
    $hostName = 'localhost';
    $userName = 'root';
    $password = '';
    $database = 'crud_system';
    return mysqli_connect($hostName,$userName,$password,$database);
    }
function readData(){
    $conn = databaseConnect();
    $query = "SELECT * FROM `category`";
    $result = mysqli_query($conn,$query);
    $categories = mysqli_fetch_all ($result , MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
    return $categories;
}
function readOneCat($id){
    $conn = databaseConnect();
    $query = "SELECT * FROM `category`
                       WHERE `id`=$id; 
    ";
    $result = mysqli_query($conn,$query);
    $category = mysqli_fetch_array($result , MYSQLI_ASSOC);
    mysqli_free_result($result);
    mysqli_close($conn);
    return $category;
}
function insertData(array $inputData){
    $conn = databaseConnect();
    $name = $inputData['name'];
    $description = $inputData['description'];
    $image = $inputData['image'];

    $query = "INSERT INTO `category`(`name`,`description`,`image`)
            VALUES ('$name','$description','$image')
    ";
    mysqli_query($conn,$query);
    mysqli_close($conn);
}

function updateData(array $inputData){
    $conn = databaseConnect();
    $id = $inputData['id'];
    $name = $inputData['name'];
    $description = $inputData['description'];
    $image = $inputData['image'];

    $query = "UPDATE `category`
              SET `name` = '$name' , `description` = '$description' , `image` = '$image'
             WHERE `id` = $id;
    ";
    mysqli_query($conn,$query);
    mysqli_close($conn);
}
function deleteData($delete){
    $conn = databaseConnect();
    $id = $delete['id'];
    $query = "DELETE FROM `category`
             WHERE `id` = $id;
    ";
    deleteFile($delete['image']);
    mysqli_query($conn,$query);
    mysqli_close($conn);

}
function deleteFile($fileName){
    unlink(__DIR__ . '/../uploads/'.$fileName);
}

?>