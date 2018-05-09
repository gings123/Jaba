<?php require("conn.php");
 session_start();
$user = $_SESSION['instructorId'];
$classQuery = "select className from class where instructorId='$user'";
$result1=mysqli_query($con, $classQuery);
//$class=mysqli_fetch_array($result1);
?>
<html style="padding-bottom: 50px;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
     <?php if(isset($_GET['activity_error']) and ($_GET['activity_error']==1)) {?>
               <script type='text/javascript'>alert('Activity already exist!');</script>
                    <?php } ?>
    <?php if(isset($_GET['activity_success']) and ($_GET['activity_success']==1)) {?>
               <script type='text/javascript'>alert('You have successfully created a activity.');</script>
                    <?php } ?>
        <?php if(isset($_GET['Activity_deleted']) and ($_GET['Activity_deleted']==1)) {?>
               <script type='text/javascript'>alert('Activity successfully deleted.');</script>
                    <?php } ?>      
    <?php if(isset($_GET['Deletion_failed']) and ($_GET['Deletion_failed']==1)) {?>
               <script type='text/javascript'>alert('Deletion Failed!.');</script>
                    <?php } ?>   
    <?php if(isset($_GET['Activity_updated']) and ($_GET['Activity_updated']==1)) {?>
               <script type='text/javascript'>alert('Activity updated successfully!.');</script>
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
            <li><a href="class.php">Class </a></li>
            <li class="active"><a href="activity.php">Activity </a></li>
            <li><a href="#">Notif(s) </a></li>
            <li><a href="code.php">Code </a></li>
        </ul>
    </div>
    <div id="divsearch">
        <div class="container" align="center"><span class="label label-default" id="class-list">ACTIVITY</span></div>
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
                                  <th>Activity Name</th>
                                  <th>Class Name</th>
                                  <th></th>
                            </tr>
                        </thead>
                
                <?php
                while($class=mysqli_fetch_array($result1)){
                    $className=$class['className'];
                    $query="select activityName,className from activity where className='$className' order by createDate";
                    $result=mysqli_query($connect, $query);
                        while($row=mysqli_fetch_array($result))
                    {
                        echo '
                            <tr>
                                <td>'.$row["activityName"].'</td>
                                <td>'.$row["className"].'</td>
                                <td>
                                    <div>
                                        <form class="form-signin" name="'.$row["activityName"].'" method="post" action="activityOption.php">
                                            <input type="hidden" name="activityName" id="activityName" value="'.$row["activityName"].'"/>
                                            <input class="btn btn-default" type="submit" name="view" value="view"/>
                                            <input class="btn btn-default" type="submit" name="delete" value="delete"/>
                                        </form> 
                                    </div>
                                </td>
                            </tr>
                        ';
                    } 
                }
                ?> 
                </div>                       
            </div>
        </div>
        </table>
        <br>
        <!--CREATE ACTIVITY -->
    <div class="container" id="concreate" align="right">
        <button class="btn btn-default" type="button" data-toggle="modal" data-target="#createActivity">Create +</button></div>

        <div id="createActivity" class="modal fade" role="dialog" align="left">
        <a data-dismiss="modal" style="padding-right: 50px; cursor:pointer;">X</a>
        <div align="center">
            <div style="padding-bottom:50px; margin:100px 150px 100px 150px;">
              <!--  <button class="btn btn-default" type="button" data-dismiss="modal" >Exit</button> -->
                <div>
                    <header class="modal-title" value="Create you own Activity"></header>
                </div>
                <div >
                    <div style="background-color: white;padding:20px; width: 800px;">
                        <p><b> Create Activity</b></p>
                        <form  style="width: 600px;" method="post" action="createActivity.php"> 
                            <div align="left">
                            <label>Activity Name</label><input class="form-control" type="text" required="" placeholder="ex: Looping" autofocus="" id="activityName" name="activityName" style="width: 300px;"><br/>
                             <label>Description</label><input class="form-control" type="text" required="" placeholder="Activity Description" autofocus="" id="description" name="description"><br/>
                            <label>Class:</label>&nbsp<select class = "from-control" name="class" id="class" required="">
                                 <?php
                                   $result3=mysqli_query($con, $classQuery);         
                                            while($row=mysqli_fetch_array($result3))
                                        {
                                            echo '
                                                    <option>'.$row["className"].'</option>
                                            ';
                                        }
                                    ?>
                            </select>
                            <br/><textarea rows="4" cols="50" class="form-control" placeholder="content" name="content" /></textarea><br/>
                                <b><table><tr><td align="center" width="300">input</td> <td align="center" width="300">ouput</td></tr></table></b>
                            <textarea style="width: 280px" rows="4" cols="4"  placeholder="Input" name="input" /></textarea>
                           <textarea style="width: 280px" rows="4" cols="4"  placeholder="Expected Output" name="output" /></textarea><br>
                            <b><table><tr><td align="center" width="170">Corresponding Grade</td></tr></table></b>
                            <input type="number" name="correspondingGrade" value="100" width="30px" maxlength="3" />
                            <input type="button" value="+" onclick="add()"/>
                            <span id="button"></span><br/>
                            <b><table><tr><td align="center" width="170">Activity Expiry</td></tr></table></b>
                            <input type="date" name="expiry"/>
                            </div>
                            <td>
                            <button style="width: 100px;float: left; margin-top: 10px;margin-right:5px; " class="btn btn-primary btn-block btn-lg btn-signin" type="submit">CREATE</button>
                            </td>
                        <div align="left"><button style="width: 100px;margin-top: 10px;" class="btn btn-primary btn-block btn-lg btn-signin" data-dismiss="modal">CANCEL</button></div>
                        </form>
                    </div>
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
      var x = document.getElementById("activityName1").value;
       document.getElementById("activityName").value = x;
    }
    function editActivity(){
      var x = document.getElementById("activityName").value;
       document.getElementById("activityName2").value = x;
       document.getElementById("activityName3").value = x;
    }
   </script>
</body>
</html>