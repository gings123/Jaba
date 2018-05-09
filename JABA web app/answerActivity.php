    <?php session_start();
require("conn.php");
$activityName = mysqli_real_escape_string($con,$_POST['activityName']);
$studentId = $_SESSION['studentId'];
$result=mysqli_query($connect,"select * from activity where activityName='$activityName' ");
$row=mysqli_fetch_array($result);   
?>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JABA</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <meta name="keywords" content="BITS,OffCampus,Pilani,Compiler,WILPD" />
            <!--<link rel="shortcut icon" href="styles/favicon.ico" />-->
            <link rel="stylesheet" type="text/css" href="styles/style.css" />        
        
            <script type="text/javascript" src="js/jquery.js"></script>
            <script type="text/javascript" src="js/compile.js"></script>
            <script type="text/javascript" src="js/tab.js"></script>
            <script type="text/javascript" src="js/jquery.form.js"></script>
            <script type="text/javascript">
                $(document).ready(function() { 
                    $('#form2').ajaxForm(function(msg) { 
                        $('#output2').php(msg);
                    }); 
                });
                function checkOutput(){
                    var out1 = document.getElementById("out").value;
                    var out2 = document.getElementById("output3").value;  
                    var oldval = document.getElementById("out2").value; 
                    if(out1 == out2){
                        document.getElementById("out2").value = oldval + out1;
                        document.getElementById("out2").style.color="green";
                        document.getElementById("out2").style.borderColor="green";
                        document.getElementById("out2").style.borderStyle="solid";
                        document.getElementById("out2").style.borderRadius="5px";
                        document.getElementById("out2").style.padding="5px";
                        document.getElementById("out3").style.color="green";
                        document.getElementById("corresponding").style.color="100";
                        document.getElementById("submitAnswer").disabled = false;

                    }else{
                        document.getElementById("out2").style.color="red";
                        document.getElementById("out2").value = oldval + out1;
                        document.getElementById("out2").style.borderColor="red";
                        document.getElementById("out2").style.borderStyle="solid";
                        document.getElementById("out2").style.borderRadius="5px";
                        document.getElementById("out2").style.padding="5px";
                        document.getElementById("out3").style.color="red";
                        document.getElementById("corresponding").style.color="0";
                        document.getElementById("submitAnswer").disabled = true;
                    }
                 }
            </script>
</head>
<body style="background-color: #F0F8FF;margin: px;text-align: left;padding:0px;">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="index.php"><strong>JaBa </strong></a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                     <li><h5 style="color:white;padding-top: 14px"> Welcome <b><?php echo $_SESSION['fname'];?></b> !</h5></li>
                    <li class="active" role="presentation"><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>    
         <div class="container" style="margin-bottom:20px;">
        <ul class="nav nav-pills">
            <li class="active"><a href="home.php">Home </a></li>
            <li><a href="#">Notif(s) </a></li>
            <li><a href="studentCode.php">Code </a></li>
        </ul>
    </div>
    <?php 
/*$result=mysqli_query($con,"select * from grades where activityName='$activityName' and studentId='$studentId' ");
$row=mysqli_fetch_array($result)
$answered = $row['answered'];
    if($answered == "yes")
    {
        ?> 
        HAPPY BIRTHDAY!
        <?php
    }
    else{ */
?>
<div id="whole" style="width:1100px;margin-top: 10px;border-style:solid;">
            <ul style="padding:10px;text-align: center;" class="nav nav-pills">
            <h1 name="activityName"><strong><?php echo $row['activityName']; ?></strong></h1>
            </ul>
        <div>
            <!--<img src="../styles/header.png" width="1000px" height="200px" alt="BITS logo" />
            <br />-->

            <!--<p class="title_name">
            WILP Online Lab
            </p>-->
            <!--Build block of blue-->
        </div>
        <div id="content" style="">
            <table class="code">
                <td class="code">   
                <form action="compilers/java.php" method="post" id="form">
                        <select name="language" id="language" hidden="">
                            <option value="java">Java</option>
                        </select>
                    <br />
                    <strong>Enter Your code here:<br/></strong>
                    <textarea name="code" rows=20 cols=80  id="code" onkeydown=insertTab(this,event)>
/* don't place package name! */
import java.util.*;
import java.lang.*;
import java.io.*;

/* Name of the class has to be 'Main' only if the class is public. */
class Main
{
    public static void main (String[] args) throws java.lang.Exception
    {

        //your code goes here

    }
}
                    </textarea><br/>
                    <span id="errorCode" class="error"></span><br/><br/>
                    <strong>Input<br/></strong><br/>
                    <p><?php echo $row['input']; ?></p>
                    <textarea hidden="" name="input" rows=7 cols=100 id="input"><?php echo $row['input']; ?></textarea></<br/>
                    <strong>Expected Output:</strong></br></br><p id="out2"><?php echo $row['output']; ?></p><br/>
                    <!--<input hidden="" type="text" value="<?php echo $row['output']; ?>" id="exOutput"/>-->
                    <textarea hidden="" name="out" rows=7 cols=100 id="out"><?php echo $row['output']; ?></textarea></<br/>
                    <input type="submit" value="Run test" id="submit">
                    <input type="reset" value="Reset"><br/> 
                </form>
                <input type="button" value="Check Results" onclick="checkOutput()"> <br/>  <br/>
                <strong>Output:</strong>
                <span id="output"></span><br/>
                </td>
                <td class="code">
            <h3 name="description"><strong><?php echo $row['description']; ?></strong></h3>
            <h3 name="content"><?php echo $row['content']; ?></h3>
            </td>
        </div>
        <table>
        <form action="submitanswer.php" method="post">
            <input type="hidden" id="activityName" name="activityName" value="<?php echo $row['activityName']; ?>">
            <input type="hidden" id="corresponding" name="corresponding" value="0">
            <input type="hidden" id="answered" name="answered" value="yes">
            <input type="hidden" id="studentId" name="studentId" value="<?php echo $studentId;?>">
            <div style="text-align:100px;margin-top:10px;"><input style="width: 100px;" class="btn btn-primary btn-block btn-lg btn-signin" type="submit" value="submit" disabled="" ="true" id="submitAnswer"></div>
        </form>
        <div id="bottom">
            <img class="tagline" src="styles/tagline.png" width="300px" height="98px" alt="BITS_tagline" />
        </div>
        </table>
        </tr>
    </div>
  <!--  <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
-->
<?php //} ?>
</body>
</html>