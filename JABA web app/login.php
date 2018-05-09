<?php
include("conn.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['teacher'])) {
            $status="teacher";
        }
        if (isset($_POST['student'])) {
            $status="student";
        }
    }
?>
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
                    <li class="active" role="presentation"><a href="Signup.php">Sign Up</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div id="login" class="container-login-section">
    <div class="container"><span class="label label-default">Login</span>
        <div class="container">
            <div class="login-card">
                <form class="form-signin" action="checklogin.php" method="post">
                    <input class="form-control" type="text" required="" placeholder="Usn" maxlength="11" autofocus="" name="id">
                    <input class="form-control" type="password" required="" placeholder="Password" maxlength="15"  name="password">
                    <input type="hidden" name="status" value="<?php echo $status; ?>">
                    <div class="checkbox">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox">Remember me</label>
                        </div>
                    </div>
                    <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit">Sign in</button>
                    <a href="index.php">Go back to selection</a>
                    <?php if(isset($_GET['login_attemptTeacher']) and ($_GET['login_attemptTeacher']==1)) {?>
            <font color="red" class="error">Bad Login or Password. Please try again. <br/></font>
            <input type="hidden" name="status" value="teacher">
            <?php } ?>
            <?php if(isset($_GET['login_attemptStudent']) and ($_GET['login_attemptStudent']==1)) {?>
            <font color="red" class="error">Bad Login or Password. Please try again. <br/></font>
            <input type="hidden" name="status" value="student">
            <?php } ?>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>