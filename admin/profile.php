<?php
require_once '../Model/Admin.php';
$admin = new Admin();
$adminInfo = $admin->getAdminById($_SESSION['admin_id']);
?>
<div class="profile-userpic">
    <img src="../img/admin.png ?>" class="img-responsive center" alt="">
</div>

<div class="profile-usertitle">
    <div class="profile-usertitle-name">
        <?php echo $adminInfo->email ?>
    </div>
    <div class="profile-usertitle-job">
        Joined on: <?php echo $adminInfo->created_at ?>
    </div>
</div>
<div align="center">
    <a href="update_password.php" class="btn btn-sm btn-outline-primary">Update Password</a>
</div>
<div>
    <h4 class="text-center profile-desc-title">Welcome Admin</h4>
</div>
<div class="website-details">
    <h5 class="text-center">@BujoBud</h5>
</div>