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
        <div id="dashboard_reloader">
            <div class="flexbox">
                <?php

                    $room_status = ["vacant ready", "occupied", "to clean", "restricted"];
                    $bg_colors = ["bg-success", "bg-warning", "bg-danger", "bg-secondary"];
                    $text_colors = ["text-success", "text-warning", "text-danger", "text-secondary"];
                    $glyphicons = ["glyphicon glyphicon-ok", "glyphicon glyphicon-log-in", "glyphicon glyphicon-trash", "glyphicon glyphicon-ban-circle"];
                    $js_functions = ["view_vacant_ready()", "view_occupied()", "", ""];
                    $js_functions_id = ["vacant_ready", "occupied", "", ""];

                    for($i = 0; $i <= 3; $i++){
                ?>
                        <div class="flexbox-room-status">
                            
                            <p class="text-center mb-0 <?php echo $text_colors[$i]; ?>">
                               <span class="<?php echo $glyphicons[$i]; ?>"></span> <br/>
                                <?php echo ucfirst($room_status[$i]); ?>
                            </p>
                            <select class="form-control mt-0 form-control-room-status" id="<?php echo $js_functions_id[$i]; ?>" onchange="<?php echo $js_functions[$i]; ?>">
                                <option value="" align="center" class="<?php echo $bg_colors[$i]; ?>">
                                    <?php
                                        $show = $conn->query("SELECT * FROM rooms WHERE room_status='".$room_status[$i]."'");
                                        $show->execute();
                                        echo "<b>".number_format($show->rowCount())."</b>";
                                    ?>
                                </option>
                                <?php
                                   $get = $conn->query("SELECT * FROM room_types ORDER BY id ASC");
                                   $get->execute();

                                   foreach($get as $row){
                                        $git = $conn->query("SELECT * FROM rooms WHERE room_type='".$row['room_type']."' AND room_status='".$room_status[$i]."'");
                                        $git->execute();

                                        foreach($git as $r){
                                            if($i == 0){
                                                ?>
                                                    <option value="<?php echo $r['room_id']; ?>">
                                                        <?php echo $r['room_type']." ".$r['room_no']; ?>
                                                    </option>
                                                <?php
                                            } elseif($i == 1) {
                                                ?>
                                                    <option value="<?php echo $r['room_type']."-".$r['room_no']; ?>">
                                                        <?php echo $r['room_type']." ".$r['room_no']; ?>
                                                    </option>
                                                <?php
                                            } else {
                                                ?>
                                                    <option value="">
                                                        <?php echo $r['room_type']." ".$r['room_no']; ?>
                                                    </option>
                                                <?php
                                            }
                                        
                                        }

                                   }
                                ?>
                            </select>
                        </div>
                <?php
                    }

                ?>
            </div>
        </div>

        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                
                </div>
                <div class="col-md-6">
                <div class="cont">
                    <div class="cont-header">
                        <p class="m-0"><span class="glyphicon glyphicon-eye-open text-primary"></span> Activity Logs</p>
                    </div>
                    <div class="cont-body">
                    
                        <div id="cont_act_holder">   
                            <div id="act_loader"></div>
                        </div>

                        <script>
                            const act_loader = document.querySelector('#act_loader');

                            act_loader.innerHTML='<center><img src="gifs/rot.gif" class="rot"/><p>Fetching activity logs...</p></center>';

                            setInterval(() => {

                                    fetch('ajax/load_activities.php')
                                    .then(response => response.text())
                                    .then(res=> {
                                        act_loader.innerHTML=res;
                                    })
                                
                                }, 2000);

                        </script>
                    </div>
                </div>
                </div>
            </div>
        </div>

    </div>
</div>
<?php include 'footer.php' ?>