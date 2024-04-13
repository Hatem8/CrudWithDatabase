<?php require_once './layouts/head.php'?>
<?php require_once './helper/functions.php'?>
<div class="d-flex flex-column h-100 bg-light">
<?php require_once './layouts/nav.php';
require_once './helper/dataFunctions.php';

$category = readOneCat($_GET['id']);
?>

<div class="row">
        <div class="col-8 mx-auto my-5">
            <h2 class="border p-2 my-2 text-center">Edit Category</h2>
          
            <form action="./controllers/updateController.php" method="POST" class="border p-3" enctype="multipart/form-data">
            <input type="hidden" name="id" class="form-control" id="id" value="<?php echo $category['id']?>">
                    <div class="form-group p-2 my-1">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" value="<?php echo $category['name']?>">
                    </div>

                    <div class="form-group p-2 my-1">
                        <label for="description">Description</label>
                        <textarea class="form-control"  id="description" name="description" type="text" style="height: 10rem" ><?php echo $category['description']?></textarea>
                    </div>     
                    <div class="form-group p-2 my-1">
                        <label> Image </label>
                        <input type="file" name="file" class ="form-control">
                    </div>           
                    <div class="form-group p-2 my-1">
                        <input type="submit" value="Edit" class="form-control">
                    </div>
            </form>
        </div>
    </div>
    <?php require_once './layouts/footer.php'?>
</div>


