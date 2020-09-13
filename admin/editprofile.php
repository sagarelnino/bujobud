<?php
require_once 'session_required.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style_updated.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />
    <link rel="stylesheet" href="profile.css">
    <title>Edit Profile</title>
</head>

<body>
    <div class="container-fluid">
        <div class=" row profile">
            <div class="col-md-2 sidebar1">
                <?php
                    include 'profile.php' ;
                ?>
            </div>
            <div class="col-md-10 sidebar2">
                <?php include 'navbar.php';?>

                <section id="profile-info">
                    <div class="offset-2 col-md-8 ">
                        <h3> Update Your Personal Information </h3>
                        <?php
                        if(!empty($_SESSION['message'])){?>
                            <h3 style="color: red" class="text-center"><?php echo $_SESSION['message']?></h3>
                        <?php }
                        unset($_SESSION['message']);
                        ?>
                        <form class="info-form" method="POST" action="update_profile.php">
                            <div class="form-group">
                                <label for="name">Full Name:</label>
                                <input type="text" class="form-control" id="fullname" name="fullname" aria-describedby="fullnameHelp" placeholder="Update Full Name" value="<?php echo $userInfo->fullname ?>">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="text" class="form-control" id="phone" name="phone" aria-describedby="phoneHelp" placeholder="Update Phone Number" value="<?php echo $userInfo->phone ?>">
                            </div>
                            <div class="form-group">
                                <label for="profession">Profession:</label>
                                <input type="text" class="form-control" id="profession" name="profession" aria-describedby="professionHelp" placeholder="Update Profession" value="<?php echo $userInfo->profession?>">
                            </div>
                            <div class="form-group">
                                <label for="dob">Date of birth:</label>
                                <input type="date" class="form-control" id="dob" name="dob" aria-describedby="dobHelp" placeholder="Update Date of Birth" value="<?php echo $userInfo->dob?>">
                            </div>
                            <div class="form-group">
                                <label for="sex">Sex:</label><br>
                                <input type="radio" id="sex_1" name="sex" aria-describedby="sexHelp" value="male" <?php if($userInfo->sex == 'male') echo 'checked'?>> Male
                                <input type="radio" id="sex_2" name="sex" aria-describedby="sexHelp" value="female" <?php if($userInfo->sex == 'female') echo 'checked'?>> Female
                            </div>
                            <div class="form-group">
                                <label for="bio">Bio:</label>
                                <textarea class="form-control" id="bio" name="bio" aria-describedby="bioHelp" placeholder="Update your bio"><?php echo $userInfo->bio?></textarea>
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </section>

                <script src="https://code.jquery.com/jquery-3.5.1.min.js">
                </script>
                <script src="../js/custom.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                <script src="../js/bootstrap.min.js"></script>
</body>

</html>