<?php session_start();

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
            </script>
</head>

<body style="background-color: #F0F8FF;">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#"><strong>JaBa </strong></a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                <li><h5 style="color:white;padding-top: 14px;"> Welcome <b><?php echo $_SESSION['fname'];?></b> !</h5></li>
                    <li class="active" role="presentation"><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>    
    <div class="container">
        <ul class="nav nav-pills">
            <li><a href="home.php">Home</a></li>
            <li><a href="#">Notif(s) </a></li>
            <li class="active"><a href="#">Code </a></li>
        </ul>
    </div>
    <div id="divsearch">
        <div class="container" align="center"></div>
    </div>
<div id="whole" style="width:900px;">
        <div>
            <!--<img src="../styles/header.png" width="1000px" height="200px" alt="BITS logo" />
            <br />-->

            <!--<p class="title_name">
            WILP Online Lab
            </p>-->
            <!--Build block of blue-->
        </div>
        <div id="content">
            <center>
            <table class="code">
                <td class="code">   
                <form action="compile.php" method="post" id="form">
                        <select name="language" id="language" hidden="">
                            <option value="java">Java</option>
                        </select>
                    <br />
                    <strong>Enter Your code here:<br/></strong>
                    <textarea name="code" rows=15 cols=100 onkeydown=insertTab(this,event) id="code">
/* don't place package name! */
import java.util.*;
import java.lang.*;
import java.io.*;

/* Name of the class has to be "Main" only if the class is public. */
class Main
{
    public static void main (String[] args) throws java.lang.Exception
    {
                    
        //your code goes here   
                        
    }
}
        
                    </textarea><br/>
                    <span id="errorCode" class="error"></span><br/><br/>
                    <strong>Sample Input please:<br/></strong>
                    <textarea name="input" rows=7 cols=100 id="input"></textarea><br/><br/>
                    <input type="submit" value="Submit" id="submit">
                    <input type="reset" value="Reset"><br/>
                </form>
                </td>
            <tr>
            <td class="code"><strong>Output:</strong>
            <span id="output"></span><br/></td>
        </div>
        <table>
        <div id="bottom">
            <img class="tagline" src="styles/tagline.png" width="300px" height="98px" alt="BITS_tagline" />
        </div>
        </table>
    </div>
    </center>
  <!--  <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
-->

</body>

</html>