<?php
session_start();
include('Model/User.php');
//create an object of user class
$user = new User();

if (isset($_POST['submit'])) {

    $fullname = $user->filter($_POST['fullname']);
    $email = $user->filter($_POST['email']);
    $password = $user->filter($_POST['password']);
    $password_confirm = $user->filter($_POST['password_confirm']);
    if(strlen($password) >= 6){
        if($password == $password_confirm){
            $pass = password_hash("$password", PASSWORD_DEFAULT);
            if($user->isExistUserWithEmail($email)){
                $_SESSION['message'] = 'Already user exists with this email';
            }else{
                if($_FILES['image']){ //check if file contains
                    $image_data = $user->imageUpload('uploads',$_FILES['image']); //imageUpload function in Database.php

                    if($image_data['result'] == true){
                        $created_at = date('Y-m-d H:i:s');
                        $token = md5(time().$email);
                        $user_id = $user->addUser($fullname,$email,$pass,$image_data['data'],$token,$created_at);
                        $_SESSION['message'] = 'Successfully registered. Please verify your email. You have been sent an email to your provided address.';
                        $subject = "Bujobud Email Verification";
                        $message = 'Welcome to bujobud. You have successfully registered. Now confirm your mail address. Please click the link. ';
                        $message .= "<a href='http://localhost/bujobud/verify.php?token=$token&&email=$email'>Verify Email here</a>";
                        $headers = "From: bujobud.com \r\n";
                        $headers .= "MIME-Version: 1.0". "\r\n";
                        $headers .= "Content-type: text/html;charset=UTF-8". "\r\n";
                        try{
                            mail($email,$subject,$message,$headers);
                        }catch (Exception $e){
                            echo $e->getMessage();
                        }
                        /*$_SESSION['id'] = $user_id;
                        header('location:user/dashboard.php');*/
                    }else{
                        $_SESSION['message'] = $image_data['data'];
                    }
                }else{
                    $_SESSION['message'] = 'No image is selected';
                }
            }
        }else{
            $_SESSION['message'] = 'The two passwords did not match';
        }
    }else{
        $_SESSION['message'] = 'Password must be greater than 6 characters';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.ico">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="css/style.css">
    <title>Sign Up</title>
</head>
<!------ Include the above in your HEAD tag ---------->

<body>
<?php include "navbar.php"; ?>

<div id="signup">
    <h2 class="text-center text-white pt-5">Create An Account</h2>
    <div class="container">
        <?php
        if(!empty($_SESSION['message'])){?>
            <h3 style="color: red" class="text-center warning"><?php echo $_SESSION['message']?></h3>
        <?php }
        unset($_SESSION['message']);
        ?>
        <div id="signup-row" class="row justify-content-center align-items-center">
            <div id="signup-column" class="col-md-6">
                <div id="signup-box" class="col-md-12">
                    <form id="signup-form" class="form" action=" " method="post" enctype="multipart/form-data" onsubmit="return validate()">
                        <h3 class="text-center title">Sign Up</h3>
                        <div class="form-group">
                            <label for="fullname" class="title">Full Name:</label><br>
                            <input type="text" name="fullname" id="fullname" class="form-control" placeholder="Enter Full Name" value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : ''; ?>" required>
                            <span class="error-message" id="fullname_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="username" class="title">Email:</label><br>
                            <input type="text" name="email" id="email" class="form-control" placeholder="Enter Email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" required>
                            <span class="error-message" id="email_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="password" class="title">Password:</label><br>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
                            <span class="error-message" id="password_error"></span>
                        </div>
                        <div class="form-group">
                            <label for="password_confirm" class="title">Confirm Password:</label><br>
                            <input type="password" name="password_confirm" id="password_confirm" class="form-control" placeholder="Confirm Password" required>
                            <span class="error-message" id="password_confirm_error"></span>
                        </div>

                        <p class="title">Image:</p>
                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="customFile" name="image" required>
                            <label class="custom-file-label" for="customFile">Choose file</label>
                            <span class="error-message" id="image_error"></span>
                        </div>

                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-info" value="submit">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<section id="footer">
    <?php include "footer.php"; ?>
</section>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
    document.getElementById('signup-box').style.height = '590px';
    function validate() {
        document.getElementById('signup-box').style.height = '660px';
        var check = 1;
        if(document.getElementById('fullrname').value === ''){
            document.getElementById('fullname_error').style.display = 'block';
            document.getElementById('fullname_error').innerText = 'Please enter fullname';
            document.getElementById('fullname').setAttribute('class','text-danger');
            check = 0;
        }else{
            document.getElementById('fullname_error').style.display = 'none';
            document.getElementById('fullname').removeAttribute('class','text-danger');
            document.getElementById('fullname').setAttribute('class','text-success');
        }
        if(document.getElementById('email').value === ''){
            document.getElementById('email_error').style.display = 'block';
            document.getElementById('email_error').innerText = 'Please enter email';
            document.getElementById('email').setAttribute('class','text-danger');
            check = 0;
        }else{
            document.getElementById('email_error').style.display = 'none';
            document.getElementById('email').removeAttribute('class','text-danger');
            document.getElementById('email').setAttribute('class','text-success');
        }
        if(document.getElementById('password').value === '' || document.getElementById('password').value.length < 6){
            document.getElementById('password_error').style.display = 'block';
            document.getElementById('password_error').innerText = 'Please enter a password more than 5 characters';
            document.getElementById('password').setAttribute('class','error-input');
            check = 0;
        }else{
            document.getElementById('password_error').style.display = 'none';
            document.getElementById('password').removeAttribute('class','error-input');
            document.getElementById('password').setAttribute('class','correct-input');
            if(document.getElementById('password').value !== document.getElementById('password_confirm').value){
                document.getElementById('password_confirm_error').style.display = 'block';
                document.getElementById('password_confirm_error').innerText = 'Both password should match';
                document.getElementById('password_confirm').setAttribute('class','error-input');
                check = 0;
            }else{
                document.getElementById('password_confirm_error').style.display = 'none';
                document.getElementById('password_confirm').removeAttribute('class','error-input');
                document.getElementById('password_confirm').setAttribute('class','correct-input');
            }
        }
        if(check === 1){
            return true;
        }
        return false;
    }
</script>
<script>
    // Add the following code if you want the name of the file appear on select
    $(".custom-file-input").on("change", function () {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

</body>
</html>