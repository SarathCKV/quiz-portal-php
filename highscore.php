<?php $con = mysqli_connect('localhost', 'root', '', 'multi_login'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
  <style>
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      text-align: center;
      padding: 15px;
    }
    .btn-outline-secondary {
      background: #fff;
      color: #000;
      border-color: #77B300;
      padding: 10px;
      width: 100px;
      font-size: 16px;
    }

    .btn-outline-secondary:hover {
      color: #fff;
      background-color: #ccc;
      border-color: #ccc;
    }

    .btn-outline-success {
      background: #fff;
      color: #77b300;
      border-color: #77B300;
      padding: 5px;
      width: 100px;
      font-size: 16px;
    }

    .btn-outline-success:hover {
      color: #fff;
      background-color: #77B300;
      border-color: #77B300;
    }
    input[type=text], select {
     width: 200px;
     padding: 12px 20px;
     margin: 8px 0;
     display: inline-block;
     border: 1px solid #ccc;
     border-radius: 4px;
     box-sizing: border-box;
    }
  </style>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">Online Quiz Portal</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="highscore.php">Global Highscores</a></li>
          <li><a href="recent.php">Most Recent Attempts</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="mainpage.php?logout='1'"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
        </ul>
      </div>
    </nav>
    <div class="jumbotron">
      <br><br><br>
      <form class="form-inline" action="highscore.php" method="post">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="sname">
        <button class="btn btn-outline-success" type="submit" name="search">Search</button>
        <select id="catid" name="catid" style="position: relative; left: 580px">
          <option value="">Select Category</option>
          <option value="1">General Knowledge</option>
          <option value="2">History</option>
          <option value="3">Sports</option>
        </select>
        <button class="btn btn-outline-success" type="submit" name="catsearch" style="position: relative; left:590px">Search</button>
        <?php
          if(isset($_POST['search'])) {
            $name = $_POST['sname'];

            $q = "UPDATE name SET search='$name' WHERE id=1";
            mysqli_query($con, $q);

            header('location: userhigh.php');
          }
          if(isset($_POST['catsearch'])) {
            $ctid = $_POST['catid'];

            $q = "UPDATE variables SET totalq1='$ctid' WHERE id=3";
            mysqli_query($con, $q);

            header('location: cathigh.php');
          }
        ?>
      </form>
      <h2 class="text-center">Highscores</h2>
      <br>
      <center><table>
        <tr>
          <th>Sl. No</th>
          <th>Username</th>
          <th>Total Questions</th>
          <th>Answers Correct</th>
          <th>Category</th>
          <th>Attempted on</th>
        </tr>
        <?php
          $query = "TRUNCATE TABLE highscore";
          mysqli_query($con, $query);

          $query = "INSERT INTO highscore (uname, tques, acorrect, cid, attemptedon) SELECT username, totalques, answerscorrect, cid, attemptedon FROM user ORDER BY answerscorrect DESC";
          $result = mysqli_query($con, $query);
          $sql = "SELECT * FROM highscore";
          $result = $con -> query($sql);
          $i = 0;
          if ($result -> num_rows > 0) {
            while (($row = $result -> fetch_assoc()) && ($i < 10)) {
              $ct = $row["cid"];
              $query = "SELECT cat_name, cid FROM categories WHERE cid='$ct'";
              $cat = $con -> query($query);
              $cname = $cat -> fetch_assoc();
              echo "<tr><td>" . $row["Uid"] . "</td><td>" . $row["uname"] . "</td><td>" . $row["tques"] . "</td><td>" . $row["acorrect"] . "</td><td>" . $cname['cat_name'] . "</td><td>" . $row['attemptedon'] . "</td></tr>";
              $i ++;
            }
            echo "</table>";
          }
          else {
            echo "0 result";
          }
          $con -> close();
        ?>
      </table>
    </div>
    <a href="index.php"><button type="button" name="goBack" class="btn btn-outline-secondary">Go Back</button></a>
    <br><br><br>
  </body>
</html>
