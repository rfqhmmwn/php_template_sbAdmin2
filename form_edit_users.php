<?php
    include 'inc/header.php';   

    $get_id = $_GET['id'];
    $query = "SELECT * FROM `users` WHERE id = $get_id";
    $get_edit = $db->query($query);
    $data = $get_edit->fetch_assoc();


    if (isset($_POST['submit']) == TRUE) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $company = $_POST['company'];
        $phone = $_POST['phone'];

        $query = "UPDATE `users` set username = '$username', password = '$password', email = '$email', first_name = '$first_name', last_name = '$last_name', company = '$company', phone = '$phone' where id = $get_id";
        $result = $db->query($query);

        $_SESSION['message'] = "Users edited successfully.";

        echo '<script>window.location.href = "users.php"</script>';
    }
?>
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-flex justify-content-between">
            <h1 class="h3 mb-4 text-gray-800">Form Edit Users</h1>
            <button onclick=location.href="users.php" class="btn btn-primary btn-user btn-block" style="max-width: 100px; margin-bottom: 20px;">
                <-
            </button>
        </div>
        <div class="card">
            <form action="form_edit_users.php?id=<?php echo $get_id;?>" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label for ="exampleInputUsername">Username</label>
                        <input type="text" type="username" name="username" value="<?php echo $data['username'] ?>" class="form-control" id="exampleInputUsername" aria-describedby="usernameHelp" placeholder="Enter username">
                    </div>
                    <div class="form-group">
                        <label for ="exampleInputPassword">Password</label>
                        <input type="password" type="password" name="password" value="<?php echo $data['password'] ?>" class="form-control" id="exampleInputPassword" aria-describedby="passwordHelp" placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <label for ="exampleInputEmail">Email</label>
                        <input type="email" type="email" name="email" value="<?php echo $data['email'] ?>" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for ="exampleInputFirstName">First Name</label>
                        <input type="text" type="first_name" name="first_name" value="<?php echo $data['first_name'] ?>" class="form-control" id="exampleInputFirstName" aria-describedby="firstnameHelp" placeholder="Enter first name">
                    </div>
                    <div class="form-group">
                        <label for ="exampleInputLastName">Last Name</label>
                        <input type="text" type="last_name" name="last_name" value="<?php echo $data['last_name'] ?>" class="form-control" id="exampleInputLastName" aria-describedby="lastnameHelp" placeholder="Enter last name">
                    </div>
                    <div class="form-group">
                        <label for ="exampleInputCompany">Company</label>
                        <input type="text" type=company" name="company" value="<?php echo $data['company'] ?>" class="form-control" id="exampleInputCompany" aria-describedby="companyHelp" placeholder="Enter company">
                    </div>
                    <div class="form-group">
                        <label for ="exampleInputPhone">Phone</label>
                        <input type="text" type="phone" name="phone" value="<?php echo $data['phone'] ?>" class="form-control" id="exampleInputPhone" aria-describedby="phoneHelp" placeholder="Enter phone">
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


