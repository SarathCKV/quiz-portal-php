<?php
  session_start();


  $con = mysqli_connect('localhost', 'root', '', 'multi_login');
  $query = "TRUNCATE TABLE highscore";
  mysqli_query($con, $query);

  $query = "INSERT INTO highscore (uname, tques, acorrect, cid, attemptedon) SELECT username, totalques, answerscorrect, cid, attemptedon FROM user ORDER BY answerscorrect DESC";
  $result = mysqli_query($con, $query);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Highscore</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </head>
  <style>
    body {
      height: 250vh;
    }
    table, th, td {
      border: 1px solid black;
      border-collapse: collapse;
      text-align: center;
      padding: 15px;
    }
    .btn-outline-success {
      background: #fff;
      color: #77B300;
      border-color: #77B300;
      padding: 10px;
      width: 100px;
      font-size: 16px;
    }

    .btn-outline-success:hover {
      color: #fff;
      background-color: #77B300;
      border-color: #77B300;
    }

    .btn-outline-success:focus, .btn-outline-success.focus {
      -webkit-box-shadow: 0 0 0 0.2rem rgba(119, 179, 0, 0.5);
              box-shadow: 0 0 0 0.2rem rgba(119, 179, 0, 0.5);
    }

    .btn-outline-secondary {
      background: #fff;
      color: #ccc;
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
  </style>
  <body>
    <a href="index.php"><button type="button" name="goBack" class="btn btn-outline-secondary">Go Back</button></a>
    <br><br><br>
    <div class="jumbotron">

      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#global">Global Highscores</a></li>
        <li><a data-toggle="tab" href="#personal">User Specific Highscores</a></li>
        <li><a data-toggle="tab" href="#recent">Most Recent Attempts</a></li>
      </ul>

      <div class="tab-content">
        <div id="global" class="tab-pane fade in active">
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
        <div id="personal" class="tab-pane fade">
          <h2 class="text-center">Highscores</h2>
          <form class="form-inline my-2 my-lg-0" method="get" action="highscore.php">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
          <?php
            if(isset($_POST['submit'])) {
              $con = mysqli_connect('localhost', 'root', '', 'multi_login');
              $query = "TRUNCATE TABLE highscore;";
              $con -> query($query);
              $name = $_GET['search'];
              $query = "INSERT INTO highscore (uname, tques, acorrect, cid, attemptedon) SELECT username, totalques, answerscorrect, cid, attemptedon FROM user WHERE username='$name' ORDER BY answerscorrect DESC";
              $con -> query($query);

              $query = "SELECT * FROM highscore";
              $result = $con -> query($query);
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
            }
          ?>
        </div>
        <div id="recent" class="tab-pane fade">
          <?php
            $con = mysqli_connect('localhost', 'root', '', 'multi_login');
            $query = "TRUNCATE TABLE highscore";
            $con -> query($query);

            $query = "INSERT INTO highscore (uname, tques, acorrect, cid, attemptedon) SELECT username, totalques, answerscorrect, cid, attemptedon FROM user ORDER BY attemptedon DESC";
            $con -> query($query);
          ?>

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
      </div>


    </div>
    <br>
    <center><a href="mainpage.php?logout='1'" style="color: red;"><button class="btn btn-outline-success">Logout</button></a>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
  </body>
</html>
