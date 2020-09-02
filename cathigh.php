<?php
  $con = mysqli_connect('localhost', 'root', '', 'multi_login');
  $query = "TRUNCATE TABLE highscore";
  $con -> query($query);
  $query = "SELECT * FROM variables WHERE id=3";
  $result = $con -> query($query);
  $var = $result -> fetch_assoc();
  $ct = $var['totalq1'];
  $query = "INSERT INTO highscore (uname, tques, acorrect, cid, attemptedon) SELECT username, totalques, answerscorrect, cid, attemptedon FROM user WHERE cid='$ct' ORDER BY answerscorrect DESC";
  $con -> query($query);
      $query = "CALL v_catehigh";
      $result = mysqli_query($con, $query);
      if(mysqli_num_rows($result)==0)
      {
        echo "no records found";
      }
      else {
        $row=mysqli_fetch_all($result,MYSQLI_ASSOC);
        mysqli_free_result($result);
      }
      mysqli_close($con);
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  </d>
  <style>
  table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    text-align: center;
    padding: 15px;
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
          <li class="active"><a href="cathigh.php">Category Wise highscores</a></li>
          <li><a href="recent.php">Most Recent Attempts</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="mainpage.php?logout='1'"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
        </ul>
      </div>
    </nav>
    <br><br><br><br>
    <center><div class="jumbotron">
      <h2 class="display-3">Users</h2>

          <center><table>
            <tr>
              <th>User Id</th>
              <th>Username</th>
              <th>Total Questions Attempted</th>
              <th>Score Obtained</th>
              <th>Category Name</th>
            </tr>

              <?php
              foreach ($row as $r){

                  echo "<tr><td>" . $r['Uid'] . "</td><td>" . $r['uname'] . "</td><td>" . $r['tques'] . "</td><td>". $r['acorrect'] . "</td><td>" . $r['cat_name'] . "</td></tr>";

                }
                echo "</table>";
            ?>
          </table>
        </div>
      </div>
    </div>
    <br><br><br><br>
  </body>
</html>
