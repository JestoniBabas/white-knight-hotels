<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hotel Management System</title>
      <meta charset="utf-8"/>
      <meta name="viewport" content="width=device-width, initial-scale=1"/>
      <link rel="stylesheet" type="text/css" href="css/glyphicons.css"/>
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
      <link rel="stylesheet" type="text/css" href="css/index.css"/>
      <link rel="icon" href="images/favicon.png"/>
</head>
<body>
<form method="POST" action="login.php">
  <div class="login">
    <div class="login-header">
      <?php
        if(isset($_GET['log'])){
            if($_GET['log'] !== ""){
                if($_GET['log'] === "success"){
                    echo '<p class="text-success text-center">
                            <img src="gifs/rot.gif" class="rot" loading="lazy"/> Logging you in...
                          </p>

                      <script>
                        setInterval(() => {
                            window.location="dashboard.php";
                        }, 3000);
                      </script>
                    ';
                } else {
                  echo '
                  <p class="text-danger text-center">Authentication failed!</p>
                ';
                }
            }
        }
      ?>
      <center><img src="images/favicon.png" class="fav_logo"/></center>
      <p class="text-secondary text-center p-0 m-0 text-banner">
          White Knight Hotels
      </p>
    </div>
    <div class="login-body">
      <label>Enter email</label>
        <input type="email" name="email" class="form-control" required /><br/>
      <label>Your password</label>
        <input type="password" name="pwd" class="form-control" required /><br/>
        <input type="submit" name="btn-login" class="btn btn-outline-success" value="LOG IN" /><br/>
    </div>
    <div class="login-footer">
      <p class="text-secondary">Forgot password? Please contact your system administrator</p>
    </div>
  </div>
</form>
</body>
</html>