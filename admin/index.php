<?php
session_start();
require_once '../Model/Admin.php';
$admin = new Admin();

    if(isset($_POST['submit'])){
        $email = $admin->filter($_POST['email']);
        $password = $admin->filter($_POST['password']);
        if($admin->isExistAdminWithEmail($email)){//check admin existence with email
            $adminInfo = $admin->getAdminByEmail($email); //get admin data
            if(password_verify($password,$adminInfo->password)){ // verify admin with password
                $_SESSION['admin_id'] = $adminInfo->id;
                header('location:dashboard.php');
            }else{
                $_SESSION['message'] = 'Credentials do not match';
            }
        }else{
            $_SESSION['message'] = 'No admin with this email';
        }

    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <!--Bootsrap 4-->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!--Fontawesome CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    <!--Custom styles-->
    <link rel="stylesheet" type="text/css" href="../css/admin.css">
    <!--Add bootstrap Js-->
    <script src="../js/bootstrap.min.js"></script>
    <!--Add Jquery-->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <?php
    if(!empty($_SESSION['message'])){?>
        <h3 style="color: red" class="text-center warning"><?php echo $_SESSION['message']?></h3>
    <?php }
    unset($_SESSION['message']);
    ?>
    <div class="d-flex justify-content-center h-100">
        <div class="card">
            <div class="card-header">
                <h3 class="sign-in">Sign In Admin</h3>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <input type="email" name="email" class="form-control" placeholder="Email">

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="row align-items-center remember">
                        <input type="checkbox">Remember Me
                    </div>
                    <div class="form-group">
                        <input type="submit" name="submit" value="Login" class="btn float-right login_btn">
                    </div>
                </form>
            </div>

    </div>
</div>
</body>
</html>