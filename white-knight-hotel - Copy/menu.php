<div class="menu" id="<?php echo $_SESSION['theme']; ?>">
    <div class="menu-header" id="<?php echo $darkHeader; ?>">
        <b class="webname">
            <img src="images/favicon.png" class="logo_banner"/>
            White Knight Hotels
        </b>
        <span class="glyphicon glyphicon-menu-hamburger burger" onclick="show_menu()"></span>
    </div>
    <nav id="nav">
        <?php
            if($_SESSION['theme'] === "dark"){
                $li = "li_dark";
            } else {
                $li = "li_light";
            }
        ?>
        <ul  class="ul_menu">
            <li class="li_profile" id="<?php echo $li; ?>">
                <a href="profile.php">
                    <div class="profile_handler">
                        <img src="images/<?php echo $_SESSION['avatar']; ?>" class="avatar_profile" loading="lazy" alt="avatar"/>
                    </div>
                        <span class="userfullname">
                            <?php
                                $name = $_SESSION['fullname'];

                                if( strlen($name) > 23){
                                    echo substr($name,0,23)."..";
                                } else {
                                    echo $name;
                                }
                            ?>
                         </span>
                </a>
            </li>
            
            <li id="<?php echo $li; ?>">
                <a href="dashboard.php">
                    <b class="glyph-md">
                        <span class="glyphicon glyphicon-th color-v"></span> 
                    </b>
                    Dashboard
                </a>
            </li>

            <li id="<?php echo $li; ?>">
                <a href="check-in.php">
                    <b class="glyph-md">
                        <span class="glyphicon glyphicon-log-in color-y"></span> 
                    </b>
                    Check In form
                </a>
            </li>
            <li id="<?php echo $li; ?>">
                <a href="settings.php">
                    <b class="glyph-md">
                        <span class="glyphicon glyphicon-cog color-b"></span> 
                    </b> Settings
                </a>
            </li>
            <li id="<?php echo $li; ?>">
                <a href="user-management.php">
                    <b class="glyph-md">
                        <span class="glyphicon glyphicon-user color-g"></span> 
                    </b> User management
                </a>
            </li>
            <li id="<?php echo $li; ?>">
                <a href="reports.php">
                    <b class="glyph-md">
                        <span class="glyphicon glyphicon-folder-close color-r"></span> 
                    </b>
                    Reports
                </a>
            </li>
        <!---
            <li id="<?php echo $li; ?>">
                <a href="activity-logs.php">
                    <b class="glyph-md">
                        <span class="glyphicon glyphicon-eye-open color-cy"></span> 
                    </b>
                    Activity Logs
                </a>
            </li>
        --->
             <li id="<?php echo $li; ?>">
                <a href="swith-mode.php?mode_id=<?php echo $_SESSION['uid']; ?>">
                    <?php
                        if($_SESSION['theme'] === "dark"){
                    ?>
                        <b class="glyph-md">
                            <span class="glyphicon glyphicon-globe color-lg"></span> 
                        </b>
                            Switch to Light Mode
                    <?php
                        } else {
                    ?>
                        <b class="glyph-md">
                            <span class="glyphicon glyphicon-certificate color-o"></span> 
                        </b>
                            Switch to Dark Mode
                    <?php
                        }
                    ?>
                    
                </a>
            </li>
        </ul>
    </nav>
</div>