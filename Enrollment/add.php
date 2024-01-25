<?php 

  include '../config/config.php';
  include '../config/conn.php';

  if (!isset($_SESSION['isLoggedIn'])) {
    header('location: login.php');
  }

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $studentID = $_POST['studentID'];
    $courseID = $_POST['courseID'];
    $AY = $_POST['AY'];
    $dateEnrolled = $_POST['dateEnrolled'];
     
    $sql = "INSERT INTO `enrollment`(`studentID`, `courseID`, `AY`, `dateEnrolled`) VALUES ('$studentID', '$courseID', '$AY', '$dateEnrolled')";
    
   if($conn->query($sql) === TRUE){
    // header('location : index.php');
    echo '<script> window.location = "index.php";</script>';
   }  

  }


?> 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo APPNAME; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body class="d-flex flex-column vh-100">
    <?php include '../layouts/Header.php'; ?>

    <div class="container">
      <h1>Add Enrollment Form</h1>
      <a href="index.php" class="btn btn-success">Back</a>
        <form action="" method="POST">
            <div class="form-group mb-2">
                <label for="">Academic Year</label>
                <input type="text" class="form-control" placeholder="YYYY-YYYY" name="AY">
            </div>        
            <div class="form-group mb-2">
                <label for="">SELECT STUDENT</label>
                <select name="studentID" id="" class="form-control">
                <?php 
                  $sql = "SELECT * FROM student";
                  $result = $conn->query($sql);
                  while ($row = $result->fetch_assoc()){
                    echo '<option value="'.$row['studentID'].'">'.$row['lastName'].', '.$row['firstName'].'</option>';
                  }
                  ?>
                </select>
            </div>
            <div class="form-group mb-2">
                <label for="">SELECT COURSE</label>
                <select name="courseID" id="" class="form-control">
                  <?php 
                  $sql = "SELECT * FROM course";
                  $result = $conn->query($sql);
                  while ($row = $result->fetch_assoc()){
                    echo '<option value="'.$row['courseID'].'">'.$row['courseName'].'</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="form-group mb-2">
                <label for="">Date Enrolled</label>
                <input type="date" class="form-control" name="dateEnrolled">
            </div>  

            <button type="submit" class="btn btn-success">Submit</button>
        </form>

       
    </div>

    <?php include '../layouts/Footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>