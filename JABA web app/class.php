<?php require("conn.php");
 session_start();
?>
<html style="padding-bottom: 50px;">

<head>
    <meta charset="utf-8">
    <meta name="jaba" content="width=device-width, initial-scale=1.0">
    <title>JABA</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

        <title>
        </title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
        <script src="https://code.jquery.com/jquery-3.2.1.js"  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="   crossorigin="anonymous"></script>
        
        <link rel="stylesheet" href="http://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
        <script type="text/javascript" src="http://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
        
       <!-- <script type="text/javascript" src="fetch.js"></script> --> 
</head>

<body style="background-color: #F0F8FF;"> 
    <?php if(isset($_GET['class_error']) and ($_GET['class_error']==1)) {?>
               <script type='text/javascript'>alert('Class already exist!');</script>
                    <?php } ?>
    <?php if(isset($_GET['class_success']) and ($_GET['class_success']==1)) {?>
               <script type='text/javascript'>alert('You have successfully created a class.');</script>
                    <?php } ?>
    <?php if(isset($_GET['Class_deleted']) and ($_GET['Class_deleted']==1)) {?>
               <script type='text/javascript'>alert('Class successfully deleted a class.');</script>
                    <?php } ?>      
    <?php if(isset($_GET['Deletion_failed']) and ($_GET['Deletion_failed']==1)) {?>
               <script type='text/javascript'>alert('Deletion Failed!.');</script>
                    <?php } ?>   
    <?php if(isset($_GET['Class_updated']) and ($_GET['Class_updated']==1)) {?>
               <script type='text/javascript'>alert('Class updated successfully!.');</script>
                    <?php } ?>   
    <?php if(isset($_GET['error']) and ($_GET['error']==1)) {?>
               <script type='text/javascript'>alert('Error!.');</script>
                    <?php } ?>         

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header"><a class="navbar-brand navbar-link" href="#"><strong>JaBa </strong></a>
                <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button>
            </div>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="nav navbar-nav navbar-right">
                <li><h5 style="color:white;padding-top: 14px"> Welcome <b><?php echo $_SESSION['fname'];?></b> !</h5></li>
                    <li class="active" role="presentation"><a href="logout.php">Logout </a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <ul class="nav nav-pills">
            <li class="active"><a href="class.php">Class </a></li>
            <li><a href="activity.php">Activity </a></li>
            <li><a href="#">Notif(s) </a></li>
            <li><a href="code.php">Code </a></li>
        </ul>
    </div>
    <div id="divsearch">
        <div class="container" align="center"><span class="label label-default" id="class-list">CLASS</span></div>
    </div>
    <div class="container">
        <div class="row">
        </div>
            <div class="row">
                <div class="col sl8 table-responsive col-sl-offset-2">
                <div class="plane">
                   <table class= "table center-table" id="table1">
                        <thead>
                            <tr align="center">
                                  <th>class name</th>
                                  <th>class code</th>
                                  <th> </th>
                            </tr>
                        </thead>
                
                <?php
                 $user = $_SESSION['instructorId'];
                 $query="select * from class where instructorId = '$user' order by className";
                 $result=mysqli_query($connect, $query);
                        while($row=mysqli_fetch_array($result))
                    {
                        echo '
                            <tr onclick="myFunction(this)">
                                <td>'.$row["className"].'</td>
                                <td>'.$row["classCode"].'</td>
                                <td>
                                    <div>
                                         <form class="form-signin" method="post" action="classOption.php">
                                            <input type="hidden" name="className" id="className" value="'.$row["className"].'" />
                                            <input type="hidden" name="classCode" id="classCode" value="'.$row["classCode"].'" />
                                            <input class="btn btn-default" type="submit" name="view" value="view"/>
                                            <input class="btn btn-default" type="submit" name="delete" value="delete"/>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        ';
                    }
                ?>
              </div>                      
            </div>
        </div>
        </table>
        <br>

        <!--CREATE CLASS -->
    <div class="container" id="concreate" align="right">
        <button class="btn btn-default" type="button" data-toggle="modal" data-target="#createclass">Create +</button>
        <div id="createclass" class="modal fade" role="dialog" >
            <div style="padding-bottom:50px; margin:100px 300px 300px 300px;">
              <!--  <button class="btn btn-default" type="button" data-dismiss="modal" >Exit</button> -->
                <a data-dismiss="modal" style="padding-right: 5px; cursor:pointer;">X</a>
                <div>
                    <header class="modal-title" value="Create your own class"></header>
                </div>
                <div >
                    <div class="login-card">
                        <p class="profile-name-card"> Create Class</p>
                        <form class="form-signin" method="post" action="createclass.php"><span class="reauth-email"> </span>
                            <input class="form-control" type="text" required="" placeholder="Class Name" autofocus="" id="classId" name="className">
                            <button class="btn btn-primary btn-block btn-lg btn-signin" type="submit">CREATE</button>
                            <button class="btn btn-primary btn-block btn-lg btn-signin" data-dismiss="modal" type="submit">CANCEL</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

  <!--  <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <script src="js/classOption.js"></script> 
    <script type="text/javascript">
    $(document).ready(function(){
    $('#table1').DataTable();
    });

    function setValue(){
      var x = document.getElementById("className").value;
       document.getElementById("className").value = x;
    }
   </script>
</body>
</html>