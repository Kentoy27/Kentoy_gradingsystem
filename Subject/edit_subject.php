<?php 

  include '../config/config.php';
  include '../config/conn.php';

  if (!isset($_SESSION['isLoggedIn'])) {
    header('location: login.php');
  }

  if(isset($_GET['id'])){
    $sql = "SELECT * FROM `subjects` WHERE subjectID =".$_GET['id'];
    $subject = $conn->query($sql);
    if ($subject->num_rows > 0){
      while($row = $subject->fetch_assoc()){
        $subject_name = $row['subjectName'];
        $subject_description = $row['subjectDescription'];
        $course_ID = $row['courseID'];
        $instructor_ID = $row['instructorID'];
      }
    }
  }

  if($_SERVER['REQUEST_METHOD'] == "POST"){
    $subjectname = $row['subjectName'];
    $subjectdescription = $row['subjectDescription'];
    $courseID = $row['courseID'];
    $instructorID = $row['instructorID'];

    $sql = "UPDATE `instructor` SET `subjectName`='$subjectname',`subjectDescription`='$subjectdescription',`courseID`='$courseID', `instructorID` = '$instructorID' WHERE subjectID = ".$_GET['id'];
    
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
      <h1>Add Student Form</h1>
      <a href="index.php" class="btn btn-success">Back</a>
       <form action="" method="POST">
            <div class="form-group mb-2">
                <label for="">Subject Name</label>
                <input type="text" class="form-control" name="subjectName" value="<?php echo $subject_name; ?>">
            </div> 
            <div class="form-group mb-2">
                <label for="">Description</label>
                <textarea name="subjectDescription" id="" cols="30" rows="5" class="form-control" value="<?php echo $subject_description; ?>"></textarea>
            </div>
            <div class="form-group mb-2">
                <label for="">Course ID</label>
                <input type="text" class="form-control" name="courseID" value="<?php echo $course_ID; ?>">
            </div> 
            <div class="form-group mb-2">
                <label for="">Instructor ID</label>
                <input type="text" class="form-control" name="instructorID" value="<?php echo $instructor_ID; ?>">
            </div> 
            <button type="submit" class="btn btn-success">Submit</button>
        </form>

       
    </div>

    <?php include '../layouts/Footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>