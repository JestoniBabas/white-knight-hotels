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
    <?php
        if(isset($_GET['register'])){
            if($_GET['register'] !== ""){
                if($_GET['register'] == "success"){
                    echo '<p class="text-center text-success">
                            <b><span class="glyphicon glyphicon-ok"></span> Registration successful!</b>
                        </p>
                        
                        <script>
                            setInterval(function() {
                                window.location="check-in.php";
                            }, 2000);
                        </script>';
                } else {
                    echo '
                        <p class="text-center text-danger">
                            <b><span class="glyphicon glyphicon-remove"></span> Something went wrong! Please refresh your browser.</b>
                        </p>
                    ';
                }
            }
        }
    ?>
    <form method="POST" action="ajax/check_in_process.php">
        <div class="cont">
            <div class="cont-header text-center">
                <h3>Check-in form</h3>
            </div>
            <div class="cont-body">
                <h4><span class="glyphicon glyphicon-info-sign text-primary"></span> Basic information</h4>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                <b>First name</b>
                                    <input type="text" name="fname" class="form-control" id="fname" required />
                            </div>
                            <div class="col-md-3">
                                <b>Middle name</b>
                                    <input type="text" name="mname" class="form-control" id="mname"  />
                            </div>
                            <div class="col-md-3">
                                <b>Last name</b>
                                    <input type="text" name="lname" class="form-control" id="lname" required />
                            </div>
                            <div class="col-md-3">
                                <b>Extension name</b>
                                    <input type="text" name="xname" class="form-control" id="xname"  />
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <b>Address</b>
                                    <input type="text" name="address" class="form-control" id="address" required />
                            </div>
                            <div class="col-md-3">
                                <b>Nationality</b>
                                    <select name="nationality" id="nationality" class="form-control">
                                        <option value="filipino">Filipino</option>
                                        <option value="afghan">Afghan</option>
                                        <option value="albanian">Albanian</option>
                                        <option value="algerian">Algerian</option>
                                        <option value="american">American</option>
                                        <option value="andorran">Andorran</option>
                                        <option value="angolan">Angolan</option>
                                        <option value="antiguans">Antiguans</option>
                                        <option value="argentinean">Argentinean</option>
                                        <option value="armenian">Armenian</option>
                                        <option value="australian">Australian</option>
                                        <option value="austrian">Austrian</option>
                                        <option value="azerbaijani">Azerbaijani</option>
                                        <option value="bahamian">Bahamian</option>
                                        <option value="bahraini">Bahraini</option>
                                        <option value="bangladeshi">Bangladeshi</option>
                                        <option value="barbadian">Barbadian</option>
                                        <option value="barbudans">Barbudans</option>
                                        <option value="batswana">Batswana</option>
                                        <option value="belarusian">Belarusian</option>
                                        <option value="belgian">Belgian</option>
                                        <option value="belizean">Belizean</option>
                                        <option value="beninese">Beninese</option>
                                        <option value="bhutanese">Bhutanese</option>
                                        <option value="bolivian">Bolivian</option>
                                        <option value="bosnian">Bosnian</option>
                                        <option value="brazilian">Brazilian</option>
                                        <option value="british">British</option>
                                        <option value="bruneian">Bruneian</option>
                                        <option value="bulgarian">Bulgarian</option>
                                        <option value="burkinabe">Burkinabe</option>
                                        <option value="burmese">Burmese</option>
                                        <option value="burundian">Burundian</option>
                                        <option value="cambodian">Cambodian</option>
                                        <option value="cameroonian">Cameroonian</option>
                                        <option value="canadian">Canadian</option>
                                        <option value="cape verdean">Cape Verdean</option>
                                        <option value="central african">Central African</option>
                                        <option value="chadian">Chadian</option>
                                        <option value="chilean">Chilean</option>
                                        <option value="chinese">Chinese</option>
                                        <option value="colombian">Colombian</option>
                                        <option value="comoran">Comoran</option>
                                        <option value="congolese">Congolese</option>
                                        <option value="costa rican">Costa Rican</option>
                                        <option value="croatian">Croatian</option>
                                        <option value="cuban">Cuban</option>
                                        <option value="cypriot">Cypriot</option>
                                        <option value="czech">Czech</option>
                                        <option value="danish">Danish</option>
                                        <option value="djibouti">Djibouti</option>
                                        <option value="dominican">Dominican</option>
                                        <option value="dutch">Dutch</option>
                                        <option value="east timorese">East Timorese</option>
                                        <option value="ecuadorean">Ecuadorean</option>
                                        <option value="egyptian">Egyptian</option>
                                        <option value="emirian">Emirian</option>
                                        <option value="equatorial guinean">Equatorial Guinean</option>
                                        <option value="eritrean">Eritrean</option>
                                        <option value="estonian">Estonian</option>
                                        <option value="ethiopian">Ethiopian</option>
                                        <option value="fijian">Fijian</option>
                                        <option value="filipino">Filipino</option>
                                        <option value="finnish">Finnish</option>
                                        <option value="french">French</option>
                                        <option value="gabonese">Gabonese</option>
                                        <option value="gambian">Gambian</option>
                                        <option value="georgian">Georgian</option>
                                        <option value="german">German</option>
                                        <option value="ghanaian">Ghanaian</option>
                                        <option value="greek">Greek</option>
                                        <option value="grenadian">Grenadian</option>
                                        <option value="guatemalan">Guatemalan</option>
                                        <option value="guinea-bissauan">Guinea-Bissauan</option>
                                        <option value="guinean">Guinean</option>
                                        <option value="guyanese">Guyanese</option>
                                        <option value="haitian">Haitian</option>
                                        <option value="herzegovinian">Herzegovinian</option>
                                        <option value="honduran">Honduran</option>
                                        <option value="hungarian">Hungarian</option>
                                        <option value="icelander">Icelander</option>
                                        <option value="indian">Indian</option>
                                        <option value="indonesian">Indonesian</option>
                                        <option value="iranian">Iranian</option>
                                        <option value="iraqi">Iraqi</option>
                                        <option value="irish">Irish</option>
                                        <option value="israeli">Israeli</option>
                                        <option value="italian">Italian</option>
                                        <option value="ivorian">Ivorian</option>
                                        <option value="jamaican">Jamaican</option>
                                        <option value="japanese">Japanese</option>
                                        <option value="jordanian">Jordanian</option>
                                        <option value="kazakhstani">Kazakhstani</option>
                                        <option value="kenyan">Kenyan</option>
                                        <option value="kittian and nevisian">Kittian and Nevisian</option>
                                        <option value="kuwaiti">Kuwaiti</option>
                                        <option value="kyrgyz">Kyrgyz</option>
                                        <option value="laotian">Laotian</option>
                                        <option value="latvian">Latvian</option>
                                        <option value="lebanese">Lebanese</option>
                                        <option value="liberian">Liberian</option>
                                        <option value="libyan">Libyan</option>
                                        <option value="liechtensteiner">Liechtensteiner</option>
                                        <option value="lithuanian">Lithuanian</option>
                                        <option value="luxembourger">Luxembourger</option>
                                        <option value="macedonian">Macedonian</option>
                                        <option value="malagasy">Malagasy</option>
                                        <option value="malawian">Malawian</option>
                                        <option value="malaysian">Malaysian</option>
                                        <option value="maldivan">Maldivan</option>
                                        <option value="malian">Malian</option>
                                        <option value="maltese">Maltese</option>
                                        <option value="marshallese">Marshallese</option>
                                        <option value="mauritanian">Mauritanian</option>
                                        <option value="mauritian">Mauritian</option>
                                        <option value="mexican">Mexican</option>
                                        <option value="micronesian">Micronesian</option>
                                        <option value="moldovan">Moldovan</option>
                                        <option value="monacan">Monacan</option>
                                        <option value="mongolian">Mongolian</option>
                                        <option value="moroccan">Moroccan</option>
                                        <option value="mosotho">Mosotho</option>
                                        <option value="motswana">Motswana</option>
                                        <option value="mozambican">Mozambican</option>
                                        <option value="namibian">Namibian</option>
                                        <option value="nauruan">Nauruan</option>
                                        <option value="nepalese">Nepalese</option>
                                        <option value="new zealander">New Zealander</option>
                                        <option value="ni-vanuatu">Ni-Vanuatu</option>
                                        <option value="nicaraguan">Nicaraguan</option>
                                        <option value="nigerien">Nigerien</option>
                                        <option value="north korean">North Korean</option>
                                        <option value="northern irish">Northern Irish</option>
                                        <option value="norwegian">Norwegian</option>
                                        <option value="omani">Omani</option>
                                        <option value="pakistani">Pakistani</option>
                                        <option value="palauan">Palauan</option>
                                        <option value="panamanian">Panamanian</option>
                                        <option value="papua new guinean">Papua New Guinean</option>
                                        <option value="paraguayan">Paraguayan</option>
                                        <option value="peruvian">Peruvian</option>
                                        <option value="polish">Polish</option>
                                        <option value="portuguese">Portuguese</option>
                                        <option value="qatari">Qatari</option>
                                        <option value="romanian">Romanian</option>
                                        <option value="russian">Russian</option>
                                        <option value="rwandan">Rwandan</option>
                                        <option value="saint lucian">Saint Lucian</option>
                                        <option value="salvadoran">Salvadoran</option>
                                        <option value="samoan">Samoan</option>
                                        <option value="san marinese">San Marinese</option>
                                        <option value="sao tomean">Sao Tomean</option>
                                        <option value="saudi">Saudi</option>
                                        <option value="scottish">Scottish</option>
                                        <option value="senegalese">Senegalese</option>
                                        <option value="serbian">Serbian</option>
                                        <option value="seychellois">Seychellois</option>
                                        <option value="sierra leonean">Sierra Leonean</option>
                                        <option value="singaporean">Singaporean</option>
                                        <option value="slovakian">Slovakian</option>
                                        <option value="slovenian">Slovenian</option>
                                        <option value="solomon islander">Solomon Islander</option>
                                        <option value="somali">Somali</option>
                                        <option value="south african">South African</option>
                                        <option value="south korean">South Korean</option>
                                        <option value="spanish">Spanish</option>
                                        <option value="sri lankan">Sri Lankan</option>
                                        <option value="sudanese">Sudanese</option>
                                        <option value="surinamer">Surinamer</option>
                                        <option value="swazi">Swazi</option>
                                        <option value="swedish">Swedish</option>
                                        <option value="swiss">Swiss</option>
                                        <option value="syrian">Syrian</option>
                                        <option value="taiwanese">Taiwanese</option>
                                        <option value="tajik">Tajik</option>
                                        <option value="tanzanian">Tanzanian</option>
                                        <option value="thai">Thai</option>
                                        <option value="togolese">Togolese</option>
                                        <option value="tongan">Tongan</option>
                                        <option value="trinidadian or tobagonian">Trinidadian or Tobagonian</option>
                                        <option value="tunisian">Tunisian</option>
                                        <option value="turkish">Turkish</option>
                                        <option value="tuvaluan">Tuvaluan</option>
                                        <option value="ugandan">Ugandan</option>
                                        <option value="ukrainian">Ukrainian</option>
                                        <option value="uruguayan">Uruguayan</option>
                                        <option value="uzbekistani">Uzbekistani</option>
                                        <option value="venezuelan">Venezuelan</option>
                                        <option value="vietnamese">Vietnamese</option>
                                        <option value="welsh">Welsh</option>
                                        <option value="yemenite">Yemenite</option>
                                        <option value="zambian">Zambian</option>
                                        <option value="zimbabwean">Zimbabwean</option>
                                    </select>
                            </div>
                            <div class="col-md-3">
                                <b>Contact no.</b>
                                    <input type="number" name="contact_no" class="form-control" id="contact_no" />
                            </div>
                            <div class="col-md-3">
                                <b>Email</b>
                                    <input type="email" name="email" class="form-control" id="email"  />
                            </div>
                        </div>
                    </div>
                    <br/>
                <h4><span class="glyphicon glyphicon-bed text-success"></span> Room and payments</h4>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                <b>Pax no.</b>
                                    <input type="number" name="pax_no" class="form-control" id="pax_no" required />
                            </div>
                            <div class="col-md-3">
                                <b>Room type</b>
                                    <select name="room_type" class="form-control" id="room_type" onchange="checkIn_roomType()" required >
                                            <option value="">Select</option>
                                        <?php
                                            $get = $conn->query("SELECT * FROM room_types ORDER BY id DESC");
                                            $get->execute();
                                            if($get->rowCount() > 0){
                                                foreach($get as $row){
                                                
                                                    ?>
                                                    <option value="<?php echo $row['room_type']; ?>">
                                                        <?php
                                                            $c = $conn->query("SELECT * FROM rooms WHERE room_type='".$row['room_type']."' AND room_status='vacant ready'");
                                                            $c->execute();

                                                            echo $row['room_type']." ".$c->rowCount();
                                                        ?>
                                                    </option>
                                                <?php
                                                }
                                    
                                            }
                                        ?>
                                    </select>
                            </div>
                            <div class="col-md-3">
                                <b>Check-in date</b>
                                        <h4><?php echo $date_default;?></h4>
                            </div>
                            <div class="col-md-3">
                                <b>Check-out date</b>
                                        <input type="date" name="out_date" id="out_date" class="form-control" onchange="calculate_staying()" required />
                                    
                            </div>
                        </div>
                    </div>

                    <div class="container-fluid">
                        <div class="row dashed">
                            <div class="col-md-3">
                                <b>Room no.</b>
                                    <h4><p id="room_no"></p></h4>
                                        <input type="hidden" name="room_no" id="inp_room_no"/>
                            </div>
                            <div class="col-md-3">
                                <b>Room price</b>
                                    <h4><p id="room_price"></p></h4>
                                        <input type="hidden" name="room_price" id="inp_room_price"/>
                                    
                            </div>
                            <div class="col-md-3">
                                <b>Number of stay</b>
                                    <h4><p id="num_stay"></p></h4>
                                        <input type="hidden" name="num_stay" id="inp_num_stay"/>
                            </div>
                            <div class="col-md-3">
                                <b>To pay</b>
                                    <h4><p id="to_pay"></p></h4>
                                        <input type="hidden" name="to_pay" id="inp_to_pay"/>
                                    
                            </div>
                        </div>
                    </div>
                    <br/>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                  <h2>Cash amount</h2>  
                            </div>
                            <div class="col-md-3">
                                  <input type="number" name="amount_given" id="inp_checkin_amount_given" class="form-control form-control-lg bg-warning text-dark" required />  
                            </div>
                            <div class="col-md-6" align="right">
                                <button class="btn btn-lg btn-outline-success" id="btn_checkIn">
                                    <span class="glyphicon glyphicon-log-in"></span> Check In
                                </button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </form>
        
    </div>
</div>
<?php include 'footer.php' ?>