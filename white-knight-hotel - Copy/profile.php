<?php 
include 'header.php';
include 'menu.php';
?>
<div class="content">

    <div class="content-header" id="<?php echo $darkHeader; ?>">
    
        <?php include 'location-indicator.php'; ?>
        
            <ul class="ul-header">
                <li title="Log out"><a href="logout.php" class="logout"><span class="glyphicon glyphicon-off"></a></span></li>
            </ul>

            <?php include 'alert_checkout.php'; ?>
            
    </div>

    <div class="content-context" id="<?php echo $_SESSION['theme']; ?>">
       
        <form method="POST" action="server.php" enctype="multipart/form-data">
            <div class="cont">
                <div class="cont-header">
                    <p class="m-0"> <span class="glyphicon glyphicon-user text-primary"></span> My Profile</p>
                </div>
                <center>
                    <img src="images/<?php echo $_SESSION['avatar']; ?>" class="profile_pic" loading="lazy"/>
                    <br/><label for="pic" class="text-primary pointer">Change Profile Picture</label>
                    <input type="file" name="avatar" class="pic" id="pic"/>
                </center>
                <div class="cont-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-4">
                                <b>Full name</b>
                                <input type="text" name="fullname" class="form-control" value="<?php echo $_SESSION['fullname']; ?>" required />
                            </div>
                            <div class="col-md-4">
                                <b>Email</b>
                                <input type="text" name="email" class="form-control" value="<?php echo $_SESSION['email']; ?>" required />
                            </div>
                            <div class="col-md-4">
                                <b>Password</b>
                                <input type="text" name="pwd" class="form-control" />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12" align="right">
                                <br/>
                                <p class="text-secondary">Leave your password blank if you don't want to change it.</p>
                                <input type="submit" name="btn_profile" class="btn btn-outline-success" value="Save Changes"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        
    </div>
</div>
<?php include 'footer.php' ?>