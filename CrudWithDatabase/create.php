<?php require_once './layouts/head.php'?>
<?php require_once './helper/functions.php'?>
<div class="d-flex flex-column h-100 bg-light">
<?php require_once './layouts/nav.php' ?>
    <div class="row">
        <div class="col-8 mx-auto my-5">
            <h2 class="border p-2 my-2 text-center">Add Category</h2>
            <?php if (isset($_SESSION['errors'])):
                                foreach ($_SESSION['errors'] as $error):?>
                                <div class="alert alert-danger text-center">
                                        <?php echo $error;?>
                                    </div>
                                <?php endforeach;
                                unset($_SESSION['errors']);
                                endif;
                                ?>
                                 <?php if (isset($_SESSION['success'])):?>
                                <div class="alert alert-success text-center">
                                        <?php echo getSession('success');?>
                                    </div>
                                <?php endif; ?>
            <form action="./controllers/createController.php" method="POST" class="border p-3" enctype="multipart/form-data">

                    <div class="form-group p-2 my-1">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name">
                    </div>
                    <div class="form-group p-2 my-1">
                        <label for="description">Description</label>
                        <textarea class="form-control" id="description" name="description" type="text" style="height: 10rem"></textarea>
                    </div>     
                    <div class="form-group p-2 my-1">
                        <label> Image </label>
                        <input type="file" name="file" class ="form-control">
                    </div>           
                    <div class="form-group p-2 my-1">
                        <input type="submit" value="Add" class="form-control">
                    </div>
            </form>
        </div>
    </div>
    <?php require_once './layouts/footer.php'?>
</div>

