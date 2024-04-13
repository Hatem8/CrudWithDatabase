<?php require_once './layouts/head.php'?>
<?php require_once './helper/functions.php'?>
<div class="d-flex flex-column h-100 bg-light">
<?php require_once './layouts/nav.php';
require_once './helper/dataFunctions.php';
$categories = readData();
?>

    <div class="row">
        <div class="col-8 mx-auto my-5">
        <?php if (isset($_SESSION['errors'])):
                                foreach ($_SESSION['errors'] as $error):?>
                                <div class="alert alert-danger text-center">
                                        <?php echo $error;?>
                                    </div>
                                <?php endforeach;
                                unset($_SESSION['errors']);
                                endif;
                                ?>
            <table class="table border rounded p-3 shadow-lg p-3 mb-5 bg-white">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($categories as $category):?>
                    <tr>
                    <th scope="row"><?php echo $category['id']?></th>
                    <td><?php echo $category['name']?></td>
                    <td><?php echo $category['description']?></td>
                    <td><img width="100px" src="./uploads/<?php echo $category['image']?>" class="img-thumbnail" alt="..."></td>
                    <td>
                        <form action="./controllers/deleteController.php" method="post">
                            <input type="hidden" name="id" value ="<?php echo $category['id']?>">
                            <input type="hidden" name="image" value ="<?php echo $category['image']?>">
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <a href="./update.php?id=<?= $category['id'] ?>" class="btn btn-primary">Edit</a>
                        </form>
                    </td>
                    </tr>
                    <?php endforeach?>
                </tbody>
            </table>
        </div>
    </div>
    <?php require_once './layouts/footer.php'?>
</div>
