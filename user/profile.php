<?php
require_once '../Model/User.php';
$user = new User();
$userInfo = $user->getUserById($_SESSION['id']);
?>
<div class="profile-userpic">
    <img src="../<?php echo $userInfo->image; ?>" class="img-responsive center" alt="">
</div>

<div class="profile-usertitle">
    <div class="profile-usertitle-name">
        <?php echo $userInfo->fullname ?>
    </div>
    <div class="profile-usertitle-job">
        <?php echo $userInfo->profession ?>
    </div>
</div>
<div align="center">
    <p class="text-success">Your profile is <?php echo $user->getUserProfileCompletion($_SESSION['id']); ?> complete</p>
    <a href="editprofile.php" class="btn btn-sm btn-outline-primary">Update</a>
</div>
<div>
    <h4 class="profile-desc-title">About Cynthia</h4>
    <span class="profile-desc-text">
        <?php if(isset($userInfo->bio) || $userInfo->bio != '') {
            echo $userInfo->bio;
        }else{?>
            Nothing added yet
        <?php }?>
    </span>
    <div class="margin-top-20 profile-desc-link">
        <i class="fa fa-birthday-cake"></i> Date of Birth
        <p class="text-info">
            <?php
                if(isset($userInfo->dob) || $userInfo->dob != ''){
                    echo $userInfo->dob;
                }else{
                    echo 'Not added yet';
                }
            ?>
        </p>
    </div>
    <div class="margin-top-20 profile-desc-link">
        <i class="fa fa-venus-mars"></i> Sex
        <p class="text-info">
            <?php
            if(isset($userInfo->sex) || $userInfo->sex != ''){
                echo $userInfo->sex;
            }else{
                echo 'Not added yet';
            }
            ?>
        </p>
    </div>
    <div class="margin-top-20 profile-desc-link">
        <i class="fa fa-play"></i> Joined On
        <p class="text-info">
            <?php
            if(isset($userInfo->created_at) || $userInfo->created_at != ''){
                echo $userInfo->created_at;
            }else{
                echo 'Not added yet';
            }
            ?>
        </p>
    </div>
</div>
<div class="website-details">
    <h5>@BujoBud</h5>
</div>