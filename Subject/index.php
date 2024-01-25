<?php 

  include '../config/config.php';
  include '../config/conn.php';

  if (!isset($_SESSION['isLoggedIn'])) {
    header('location: login.php');
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
      <h1>Subject</h1>
      <a href="add_subject.php" class="btn btn-success my-3">Add Subject</a>
      <table class="table">
        <thead>
          <th>Subject Id</th>
          <th>Subject Name</th>
          <th>Subject Description</th> 
          <th>Course ID</th>
          <th>Instructor ID</th>
          <th>Action</th>
        </thead>
        <tbody>
          <?php

          $sql = "SELECT * FROM `subjects` LEFT JOIN course ON subjects.courseID = course.courseID LEFT JOIN instructor ON subjects.instructorID = instructor.instructorID";
          $result = $conn->query($sql); 
          if ($result->num_rows > 0){
            while($row = $result->fetch_assoc()) {
              echo '<tr>';
                echo '<td>'.$row['subjectID'].'</td>';
                echo '<td>'.$row['subjectName'].'</td>';
                echo '<td>'.$row['subjectDescription'].'</td>';
                echo '<td>'.$row['courseName'].'</td>'; 
                echo '<td>'.$row['lastName'].', '.$row['firstName'].'</td>'; 
                echo '<td><a href="edit_subject.php?id='.$row['subjectID'].'" class="btn btn-info mx-2">Edit</a><a href="delete.php?id='.$row['subjectID'].'" class="btn btn-danger">Delete</a></td>';
              echo '</tr>';
            }
          }
           
          ?>
        </tbody>
      </table>
    </div>

    <?php include '../layouts/Footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>