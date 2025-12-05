<?php
    include 'inc/header.php';   
    $groups = new Groups;

    if (isset($_POST['submit']) == TRUE) {
        $name = $_POST['name'];
        $description = $_POST['description'];

       $groups->add_group($name, $description);
    }
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-4 text-gray-800">Form Add Groups</h1>
            <a href="groups.php" class="btn btn-primary btn-sm d-sm-inline-block d-none"><i class="fas fa-chevron-left"></i> kembali</a>
        </div>
        <!-- <div class="row">
            <div class="col">
            <h1 class="h3 mb-4 text-gray-800">Form Add Groups</h1>
            </div>
            <div class="col">
                <div class="float-right">
                    <a href="groups.php" class="btn btn-primary btn-sm d-sm-inline-block d-none"><i class="fas fa-chevron-left"></i> kembali</a>
                </div>
            </div>
        </div> -->
        <div class="card">
            <form action="form_add_groups.php" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for ="exampleInputName">Name</label>
                        <input type="text" type="name" name="name" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for ="exampleInputDescription">Description</label>
                        <input type="text" type="description" name="description" class="form-control" id="exampleInputDescriptio" aria-describedby="descriptionHelp" placeholder="Enter description">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" name="submit" value="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->

<?php
    include 'inc/footer.php';   
?>


