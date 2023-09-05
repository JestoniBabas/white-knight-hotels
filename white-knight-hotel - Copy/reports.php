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
       

        
    </div>
</div>
<?php include 'footer.php' ?>