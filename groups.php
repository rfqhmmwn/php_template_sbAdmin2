<?php
    include 'inc/header.php';   
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800 ">Groups</h1>
            <button onclick=location.href="form_add_groups.php" class="btn btn-primary btn-user btn-block" style="max-width: 200px; margin-bottom: 20px;">
                Add
            </button>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <?php   
                        $query = $db->query("SELECT * FROM `groups`");

                        // $result = $query->fetch_all();
                    ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Group Name</th>
                                <th>Description</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php while($row = $query->fetch_assoc()) : ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['description']; ?></td>
                                    <td>
                                         <a href="groups.php?action=hapus&id=<?php echo $row['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                         <a href="form_edit_groups.php?id=<?php echo $row['id'];?>" class="btn btn-warning btn-sm">Edit</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                            <?php
                                if(isset($_GET['action']) == 'hapus' && isset($_GET['id'])) 
                                    {   
                                    $get_id = $_GET['id'];

                                    $query = "DELETE FROM `groups` WHERE id = $get_id";
                                    $result = $db->query($query);

                                    echo '<script>window.location.href = "groups.php"</script>';
                                    
                                    }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

<?php
    include 'inc/footer.php';   
?>

