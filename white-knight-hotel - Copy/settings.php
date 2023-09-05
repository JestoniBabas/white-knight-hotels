<?php 
include 'header.php';
include 'menu.php';

if($_SESSION['theme'] == "dark"){
    $pointing_arrow = "pointing-arrow-cont-dark";
} else {
    $pointing_arrow = "pointing-arrow-cont-light";
}
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
        <div class="container-fluid">
            <div class="row">

            <div class="col-md-8">
                <div id="rm_reloader">
                    <div class="cont">
                        <div class="cont-header">
                            <p class="m-0 p-0"><span class="glyphicon glyphicon-info-sign text-info"></span> Room informations</p>
                            <?php
                                $count = $conn->query("SELECT COUNT(room_no) as room_count FROM rooms");
                                $count->execute();
                                $r = $count->fetch(PDO::FETCH_OBJ);
                                if($r->room_count > 0){

                                    
                            ?>
                                <p>Total rooms = <?php echo $r->room_count; ?></p>
                                <div class="container-fluid">
                                    <div class="row">
                                        <?php
                                            $room_stat = ["vacant ready", "occupied", "to clean", "restricted"];
                                            $text_color = ["text-success", "text-warning", "text-danger", "text-secondary"];
                                            $bg_color = ["alert-success", "alert-warning", "alert-danger", "alert-secondary"];
                                            $glyph = ["glyphicon glyphicon-ok", "glyphicon glyphicon-log-in", "glyphicon glyphicon-trash", "glyphicon glyphicon-ban-circle"];

                                            for($i = 0; $i <= 3; $i++){
                                        ?>
                                            <div class="col-md-3 <?php echo $text_color[$i]; ?>">
                                                <?php 
                                                    $get = $conn->query("SELECT COUNT(room_no) as all_rooms FROM rooms WHERE room_status='".$room_stat[$i]."'");
                                                    $get->execute();
                                                    $are = $get->fetch(PDO::FETCH_OBJ);
                                                    
                                                ?>
                                                <div class="alert <?php echo $bg_color[$i]; ?> p-2">
                                                    <h4 class="m-0"><?php echo number_format($are->all_rooms); ?></h4>
                                                </div>
                                                <p><span class="<?php echo $glyph[$i]; ?>"></span> <?php echo ucfirst($room_stat[$i]); ?></p>
                                            </div>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="cont-body">
                            
                            <?php
                                $get = $conn->query("SELECT * FROM room_types ORDER BY id ASC");
                                $get->execute();

                                if($get->rowCount() < 1){
                                    echo '<p class="text-center">No data</p>';
                                } else {
                            ?>
                                <table class="tbl_room_infos">
                                    <tr>
                                        <td><b>Room No.</b></td>
                                        <td><b>Room Price</b></td>
                                        <td><b>Room Status</b></td>
                                        <td colspan="2"><b>Actions</b></td>
                                    </tr>
                            <?php
                                foreach($get as $row){

                                    $count = $conn->query("SELECT COUNT(room_no) as room_count FROM rooms WHERE room_type='".$row['room_type']."'");
                                    $count->execute();
                                    $r = $count->fetch(PDO::FETCH_OBJ);

                                    if($r->room_count <= 1){
                                        $cnt = " (".$r->room_count." room)";
                                    } else {
                                        $cnt = " (".$r->room_count." rooms)";
                                    }

                                    
                            ?>
                                    <tr>
                                        <td colspan="5">
                                            <div class="<?php echo $pointing_arrow; ?>">
                                                <?php echo $row['room_type'].$cnt; ?>

                                                <button class="btn btn-secondary btn-sm btn_edit_room_type" id="<?php echo $row['id']; ?>" onclick="room_cuztomize(this.id)">
                                                    <span class="glyphicon glyphicon-pencil"></span> Edit
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                              
                            <?php
                                    $fetch = $conn->query("SELECT * FROM rooms WHERE room_type='".$row['room_type']."' ORDER BY room_no ASC");
                                    $fetch->execute();
                                    if($fetch->rowCount() < 1){
                            ?>
                                    <tr>
                                        <td colspan="5">No rooms found!</td>
                                    </tr>
                            <?php
                                    } else {
                                        foreach($fetch as $r){
                                            
                                        ?>
                                            <tr>
                                                <td><?php echo $r['room_no']; ?></td>
                                                <td><?php echo number_format($r['room_price']); ?></td>
                                                <td
                                                <?php
                                                    if($r['room_status'] == "occupied"){
                                                        echo 'colspan="3"';
                                                    }
                                                ?>
                                                >
                                                    <?php

                                                        if($r['room_status'] == "vacant ready"){
                                                            echo '<p class="text-success m-0"><span class="glyphicon glyphicon-ok"></span> '.ucfirst($r['room_status']).'</p>';
                                                        } elseif($r['room_status'] == "occupied"){
                                                            echo '<p class="text-warning m-0"><span class="glyphicon glyphicon-log-in"></span> '.ucfirst($r['room_status'])." ";
                                                                $git = $conn->query("SELECT pax_no FROM check_in WHERE room_type='".$row['room_type']."' AND room_no='".$r['room_no']."'");
                                                                $git->execute();
                                                                echo '<span class="badge bg-warning text-dark">'.$git->rowCount().' Pax</span>';
                                                            '</p>';
                                                        } elseif($r['room_status'] == "to clean"){
                                                            echo '<p class="text-danger m-0"><span class="glyphicon glyphicon-trash"></span> '.ucfirst($r['room_status']).'</p>';
                                                        } else {
                                                            echo '<p class="text-secondary m-0"><span class="glyphicon glyphicon-ban-circle"></span> '.ucfirst($r['room_status']).'</p>';
                                                        }
                                                    ?>
                                                </td>
                                                <?php
                                                    if($r['room_status'] != "occupied"){
                                                ?>
                                                 <td>
                                                    <select name="room_status" id="room_id<?php echo $r['room_id']; ?>" class="form-control">
                                                       <option value="">Select</option>
                                                       <option value="vacant ready" class="bg-success">Vacant Ready</option>
                                                       <option value="to clean" class="bg-danger">To clean</option>
                                                       <option value="restricted" class="bg-secondary">Restricted</option>
                                                        
                                                    </select>
                                                </td>
                                                <td><input type="submit" class="btn btn-sm btn-outline-primary" onclick="update_room_status(<?php echo $r['room_id']; ?>)" value="Save"/></td>
                                                <?php
                                                    }
                                                ?>
                                               
                                            </tr>
                                        <?php
                                        }
                                    }
                                }      
                            ?>


                                </table>
                            <?php
                                }
                            ?>
                          
                        </div>
                    </div>
                </div><br/>
                </div>

                <div class="col-md-4">
                   
                    <form id="addRoomTypeForm">
                        <div class="cont">
                            <div class="cont-header">
                                <p class="m-0 p-0"><span class="glyphicon glyphicon-plus-sign text-success"></span> Add room type</p>
                                <p id="addRoomTypeLoader" class="m-0 p-0"></p>
                            </div>
                            <div class="cont-body">
                                <input type="text" name="addRoomType" id="addRoomType" class="form-control" required /><br/>
                                <input type="submit" id="btnAddRoomType" class="btn btn-outline-success" value="Submit"/>
                            </div>
                        </div>
                    </form><br/>

                    <form id="roomSet">
                        <div class="cont">
                            <div class="cont-header">
                                <p class="m-0 p-0"><span class="glyphicon glyphicon-pencil text-primary"></span> Set room</p>
                                <p id="setRoomLoader" class="m-0 p-0"></p>
                            </div>
                            <div class="cont-body">
                                <b>Room type</b>
                                    <select name="room_type" class="form-control" id="room_type" required >
                                        <option value="">SELECT</option>
                                        <?php
                                            $get = $conn->query("SELECT * FROM room_types ORDER BY id DESC");
                                            $get->execute();

                                            if($get->rowCount() < 1){
                                            ?>
                                                <option value="">No room type found!</option>
                                            <?php
                                            } else {
                                                foreach($get as $row){
                                            ?>
                                                <option value="<?php echo $row['room_type']; ?>"><?php echo $row['room_type']; ?></option>
                                            <?php
                                                }
                                            }
                                        ?>
                                    </select><br/>
                                <b>Room no.</b>
                                    <input type="text" name="room_no" id="room_no" class="form-control" required /><br/>
                                <b>Room amount</b>
                                    <input type="number" name="room_price" id="room_price" class="form-control" required /><br/>    
                                <b>Room status</b>
                                    <select name="room_status" id="room_status" class="form-control" required >
                                        <option value="vacant ready" class="bg-success text-white">Vacant Ready</option>
                                        <option value="restricted" class="bg-secondary text-white">Restricted</option>
                                    </select><br/>
                                    <input type="submit" class="btn btn-outline-success" value="Submit"/>
                            </div>
                        </div>
                    </form><br/>

                </div>
                
            </div>
        </div>  
    </div>
</div>
<?php include 'footer.php' ?>