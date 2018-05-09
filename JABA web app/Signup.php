
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JABA</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#"><strong>JaBa </strong></a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active" role="presentation"><a href="index.php">Login </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="login" class="container-login-section">
        <div class="container"><span class="label label-default">Sign up</span>
            <div class="login-card">
                <form target="_top" class="form-signin" action="checksignup.php" method="post">
                    <input class="form-control" type="text" required="" placeholder="First Name" maxlength="30" autofocus="" id="fname" name="fname">
                    <input class="form-control" type="text" required="" placeholder="Last Name" maxlength="30" id="lname" name="lname">
                    <input class="form-control" type="text" placeholder="Middle Initial" maxlength="1" id="mi" name="mi" required="">
                    <label>Gender:</label><br/>
                    <LABEL>Male</LABEL>&nbsp<input type="radio" name="gender" value="male" required="true"><br/>
                    <LABEL>Female</LABEL>&nbsp<input type="radio" name="gender" value="female" required="true"><br/>
                    <input class="form-control" type="email" required="" placeholder="Email address" maxlength="50" id="email" name="email">
                    <input class="form-control" type="text" required="" placeholder="usn" maxlength="11" minlength="11" id="usn" name="usn">
                    <input class="form-control" type="password" required="" placeholder="Password" maxlength="15" minlength="6" id="password" name="password">
                    <input class="form-control" type="password" required="" placeholder="Verify Password" maxlength="15" minlength="6" id="repassword" name="repassword">
                    <LABEL>I'm a teacher</LABEL>&nbsp<input type="radio" name="status" value="teacher" required="true"><br/>
                    <LABEL>I'm a student</LABEL>&nbsp<input type="radio" name="status" value="student" required="true"><br/>
                    <?php if(isset($_GET['password_did_not_match']) and ($_GET['password_did_not_match']==1)) {?>
                    <script type='text/javascript'>alert('Password did not match!');</script>
                    <?php } ?>
                    <?php if(isset($_GET['usn_taken']) and ($_GET['usn_taken']==1)) {?>
                    <script type='text/javascript'>alert('USN already exist!');</script>
                    <?php } ?>
                    <?php if(isset($_GET['signup_success']) and ($_GET['signup_success']==1)) {?>
                    <script type='text/javascript'>alert('You have successfully created an account!');</script>
                    <?php } ?>

                    <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit">Sign up</button>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="assets/js/errors.js"></script>
</body>

</html>