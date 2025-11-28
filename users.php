<?php
    include 'inc/header.php';   
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex justify-content-between">
            <h1 class="h3 mb-2 text-gray-800 ">Users</h1>
            <button onclick=location.href="form_add.users.php" class="btn btn-primary btn-user btn-block" style="max-width: 200px; margin-bottom: 20px;">
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
                                </tr>
                            <?php endwhile; ?>
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

