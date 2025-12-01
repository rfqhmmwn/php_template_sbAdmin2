<?php
    include 'inc/header.php';   

    $get_id = $_GET['id'];
    $query = "SELECT * FROM `groups` WHERE id = $get_id";
    $get_edit = $db->query($query);
    $data = $get_edit->fetch_assoc();

    if (isset($_POST['submit']) == TRUE) {
        $name = $_POST['name'];
        $description = $_POST['description'];

        $query = "UPDATE `groups` SET name = '$name', description = '$description' WHERE id = $get_id";
        $result = $db->query($query);

        echo '<script>window.location.href = "groups.php"</script>';
    }
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex justify-content-between">
            <h1 class="h3 mb-4 text-gray-800">Form Edit Groups</h1>
            <button onclick=location.href="groups.php" class="btn btn-primary btn-user btn-block" style="max-width: 100px; margin-bottom: 20px;">
                <-
            </button>
        </div>
        <div class="card">
            <form action="form_edit_groups.php?id=<?php echo $get_id;?>" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for ="exampleInputName">Name</label>
                        <input type="text" type="name" name="name" value="<?php echo $data['name'];?>" class="form-control" id="exampleInputName" aria-describedby="nameHelp" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for ="exampleInputDescription">Description</label>
                        <input type="text" type="description" name="description" value="<?php echo $data['description'] ?>" class="form-control" id="exampleInputDescriptio" aria-describedby="descriptionHelp" placeholder="Enter description">
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


