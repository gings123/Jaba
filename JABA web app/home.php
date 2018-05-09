<?php session_start();
require("conn.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['join'])) {
            $classCode=mysqli_real_escape_string($con,$_POST["classCode"]);
            $classQuery = "SELECT * FROM class WHERE classCode='$classCode'";
            mysqli_query ($con,$classQuery);
            if(mysqli_affected_rows($con) == 1){
                $class=mysqli_query($con,$classQuery);
                $classRow=mysqli_fetch_array($class);
                $className=$classRow['className'];
                $studentId=$_SESSION['studentId'];
               $sql = "INSERT INTO joinClass (className,studentId)
                            VALUES ('$className','$studentId')";
                            if (mysqli_query($connect,$sql)) {
                            header('Location: home.php?ClassJoined=1');
                            } else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($con);
                            }
            }
            else
            {
                header('Location: home.php?WrongCode=1');
            } 
        }
        if (isset($_POST['reply'])) {
            $activityName=mysqli_real_escape_string($con,$_POST["activityName"]);
            $comment=mysqli_real_escape_string($con,$_POST["comment"]);
            $comDate= date('y/m/d h:i:s');
            $fname=$_SESSION['fname'];
                if(trim($comment) == ""){
                    header('Location: home.php');
                }
                else{
                $sql = "INSERT INTO comments (activityName,fname,comment,comDate)
                                VALUES ('$activityName','$fname','$comment','$comDate')";
                                if (mysqli_query($connect, $sql)) {

                                } else {
                                    echo "Error: " . $sql . "<br>" . mysqli_error($con);
                                }
                }
        }
    }
?>
<!DOCTYPE html>
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

<body style="background-color: #F0F8FF;">
 <?php if(isset($_GET['ClassJoined']) and ($_GET['ClassJoined']==1)) {?>
               <script type='text/javascript'>alert('Class Joined successfully');</script>
                    <?php } ?>
 <?php if(isset($_GET['WrongCode']) and ($_GET['WrongCode']==1)) {?>
               <script type='text/javascript'>alert('The class code you entered was invalid');</script>
                    <?php } ?>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#"><strong>JaBa </strong></a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><h5 style="color:white;padding-top: 14px;"> Welcome <b><?php echo $_SESSION['fname'];?></b> !</h5></li>
                    <li class="active" role="presentation"><a href="logout.php">Logout </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container" style="margin-bottom:20px;">
        <ul class="nav nav-pills">
            <li class="active"><a href="#">Home </a></li>
            <li><a href="#">Notif(s) </a></li>
            <li><a href="studentCode.php">Code </a></li>
        </ul>
    </div>
            <div id="login" class="container-login-section" style="font-family:inherit;">
                                    <div style="float:left;width: 190px;">
                                    <form action="home.php" method="post">
                                        <div class="login-card" style="width:270px;height:200px;padding:50px;margin-left:120px;background-color:white;margin-top: 0px;">
                                        <p class="profile-name-card"> Join a class</p>
                                         <input class="form-control" type="text" required="" placeholder="Class Code"  id="classCode" name="classCode">
                                                <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit" name="join">Join</button>
                                        </div>
                                    </form>
                                        <div class="login-card" style="width:270px;padding:10px;margin-left:120px;margin-top: 0px;background-color:white;">
                                        <p class="profile-name-card"> Classes Joined</p>
                                        <?php 
                                        $studentId = $_SESSION['studentId'];
                                        $query2="select className from joinClass where studentId = '$studentId' order by className";
                                        $result2=mysqli_query($con, $query2);
                                                while($row2=mysqli_fetch_array($result2)){
                                                    echo ' 
                                                    <form action="classProfile.php?'.$row2['className'].'" method="post" style="margin-bottom:1px;">
                                                     <input type="hidden" value="'.$row2['className'].'" name="className"/>
                                                    <button type="submit" class="btn btn-primary btn-block btn-lg btn-signin">'.$row2['className'].'</button>
                                                    </form>';
                                                    }
                                        ?>
                                        </div>
                                    </div>

            <div class="row">
                <div class="col sl8 table-responsive col-sl-offset-2">
                
                   <table class= "table center-table" id="table1">
                        <thead>
                            <tr align="center">
                            </tr>
                        </thead>
                
                <?php
                $studentId = $_SESSION['studentId'];
                $query2="select className from joinClass where studentId = '$studentId'";
                $result2=mysqli_query($con, $query2);
                while($row2=mysqli_fetch_array($result2)){
                    $className = $row2['className'];
                $query="select * from activity where className='$className' order by createDate";
                $result=mysqli_query($con,$query);
                        while($row=mysqli_fetch_array($result))
                    {
                        $activityName= $row['activityName'];
                        $queryInsId="select instructorId from activitycreated where activityName='$activityName'";
                        $instructor=mysqli_query($con,$queryInsId);
                        $instructorId1=mysqli_fetch_array($instructor);
                        $instructorId=$instructorId1['instructorId'];
                        $queryIns="select * from tbl_instructor where instructorId='$instructorId'";
                        $resultIns=mysqli_query($con,$queryIns);
                        $rowIns=mysqli_fetch_array($resultIns);
                        $instructorName = $rowIns['fname'].$rowIns['lname'];
                        echo '
                            <tr onclick="myFunction(this)">
                                   <div id="login" class="container-login-section" style="font-family:inherit;">
                                    <div class="container">
                                        <div class="login-card" style="max-width:740px;padding:40px 0px 0px 0px;background-color:white;margin-top:0px;">
                                            <div style="padding:0px 40px 0px 40px;">
                                            <h4>'.$instructorName.' added an activity to <a href="">'.$row['className'].'</a></h4><br/>
                                               <div style="border-left: 1px solid #e5e6e8;border-right:1px solid #e5e6e8;border-top: 1px solid #e5e6e8;border-bottom: 1px solid #e5e6e8;padding:10px;margin-left:100px;">
                                               <form method="post" action="answerActivity.php">
                                               <input type="hidden" name="activityName" value="'.$row['activityName'].'">
                                               <button type="submit" class="btn btn-default" style="float:right;border-radius:5px;">
                                               </form>
                                            <b style="color:#3793e0;">Answer activity</b></button>
                                               <h5>'.$row['activityName'].'</h5>
                                               <h5>'.$row['description'].'</h5>
                                               <h5>activity will expire on : '.$row['expiration'].'</h5>
                                               <h5><a>Download Attachment</a></h5>
                                               </div>
                                            </div>
                                            <div style="background-color:#fcfcfc">
                                                 <hr style="height:1px;border:none;color:#e5e6e8;background-color:#e5e6e8;" />
                                                <div style="padding:0px 50px 0px 50px;">
                                                <h5 style="color:#c1c1c1;float:right;">Date posted : '.$row['createDate'].'</h5>
                                                 <h5><a href="" style="color:#c1c1c1;">Attach</a><b> • </b><a href=""  style="color:#c1c1c1;">Like</a><h5>
                                                </div> 
                                                <hr style="height:1px;border:none;color:#e5e6e8;background-color:#e5e6e8;" />
                                                <div style="padding:0px 40px 5px 40px;">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                        ';
                    }
                }
                ?>
                                    
            </div>
        </div>
        </table>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
    $('#table1').DataTable();
    });
   </script>


   <!--COMMENT CODE
    //COMMENTS
    $comSql = "select * from comments where activityName = '$activityName' order by comDate";
    $commentArray=mysqli_query($con,$comSql);
     while($commentRow=mysqli_fetch_array($commentArray))
     {
        echo '<hr style="height:1px;border:none;color:#e5e6e8;background-color:#e5e6e8;" />
        <h5 style="float:left;padding-right:10px;">'.$commentRow['fname'].'<h5><p style="width:530px; margin:9px;" name="comment">'.$commentRow['comment'].'</p>';
     }
     //comment FORM
     <form method="post" action="home.php">
         <input type="hidden" value="'.$row['activityName'].'" name="activityName" id="activityName"/>
        <button name="reply" id="reply" type="submit" class="btn btn-default" style="float:right;border-radius:5px;">
         <b style="color:#3793e0;">Reply</b></button>
        <h5 style="float:left;padding-right:10px;">'.$_SESSION['fname'].'<h5><input type="text" placeholder="type a reply" style="width:530px; margin:9px;" class="form-control" name="comment" />
    </form>
   -->
</body>

</html>