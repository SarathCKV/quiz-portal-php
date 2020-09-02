<?php
    $con = mysqli_connect('localhost', 'root', '', 'multi_login');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
  <style media="screen">
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
  </style>
  <body>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="index.php">Online Quiz Portal</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="highscore.php">Global Highscores</a></li>
          <li class="active"><a href="userhigh.php">User Specific highscores</a></li>
          <li><a href="recent.php">Most Recent Attempts</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="mainpage.php?logout='1'"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
        </ul>
      </div>
    </nav>
    <div class="jumbotron">
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
          $con = mysqli_connect('localhost', 'root', '', 'multi_login');
          $query = "TRUNCATE TABLE highscore";
          $con -> query($query);
          $query = "SELECT * FROM name WHERE id=1";
          $result = $con -> query($query);
          $var = $result -> fetch_assoc();
          $name = $var['search'];
          $query = "INSERT INTO highscore (uname, tques, acorrect, cid, attemptedon) SELECT username, totalques, answerscorrect, cid, attemptedon FROM user WHERE username='$name' ORDER BY answerscorrect DESC";
          $con -> query($query);
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
