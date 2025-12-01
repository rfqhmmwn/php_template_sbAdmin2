<?php
    include 'inc/header.php';   
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800 ">Users</h1>
            <?php 
                if(isset($_SESSION['message']) == TRUE)
                    {
                        // echo $_SESSION['message'];
                        $message = $_SESSION['message'];
                        // echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        //         ' . $message . '
                        //       </div>';
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                ' . $message . '
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>';
                        unset($_SESSION['message']);
                    }
            ?>
            <button onclick=location.href="form_add_users.php" class="btn btn-primary btn-user btn-block" style="max-width: 200px; margin-bottom: 20px;">
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
                        $query = $db->query("SELECT id, username, password, email, first_name, last_name, company, phone FROM `users`");
 
                        // $result = $query->fetch_all();
                    ?>
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Email</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Company</th>
                                <th>Phone</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Email</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Company</th>
                                <th>Phone</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php while($row = $query->fetch_assoc()) : ?>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['password']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['first_name']?></td>
                                    <td><?php echo $row['last_name']; ?></td>
                                    <td><?php echo $row['company']; ?></td>
                                    <td><?php echo $row['phone']; ?></td>
                                    <td style="float: center;">
                                         <a href="users.php?action=hapus&id=<?php echo $row['id'];?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this item?');">Delete</a>
                                         <a href="form_edit_users.php?id=<?php echo $row['id'];?>" class="btn btn-warning btn-sm">Edit</a>
                                    </td>
                                </tr>
                            <?php endwhile; ?>
                            <?php
                                if(isset($_GET['action']) == 'hapus' && isset($_GET['id'])) 
                                    {   
                                    $get_id = $_GET['id'];

                                    $query = "DELETE FROM `users` WHERE id = $get_id";
                                    $result = $db->query($query);

                                    echo '<script>window.location.href = "users.php"</script>';
                                    
                                    }
                            ?>
                            <?php
                                if(isset($_GET['action']) == 'hapus') 
                                    {    
                                        $_SESSION['message'] = "Data berhasil dihapus.";
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

