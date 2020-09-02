<?php
  $con = mysqli_connect('localhost', 'root', '', 'multi_login');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Questions Page</title>
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
  .buttn {
    background: gray;
    border: 2px solid gray;
    color: #fff;
    padding: 10px;
    transition: transsform 80ms ease-in;
    -webkit-transition-duration: 0.4s;
    transition-duration: 0.4s;
  }
  button:hover {
      background-color: #fff;
      color: gray;
  }
  </style>
  <body>
    <a href="home.php"><button type="button" name="goBack" class="buttn">Go Back</button></a>
    <br><br><br><br>
    <center><div class="jumbotron">
      <h2 class="display-3">Questions</h1>
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#general">General Knowledge</a></li>
        <li><a data-toggle="tab" href="#hist">History</a></li>
        <li><a data-toggle="tab" href="#sports">Sports</a></li>
      </ul>
      <div class="tab-content">
        <div id="general" class="tab-pane fade in active">
          <br>
          <center><table>
            <tr>
              <th>Question No</th>
              <th>Question</th>
              <th>Category</th>
            </tr>
            <?php
              $query = "SELECT * FROM variables WHERE id=1";
              $result = mysqli_query($con, $query);
              $var = mysqli_fetch_assoc($result);
              $tq = $var['totalq1'];
              $q = "SELECT * FROM questions WHERE cid=1 ORDER BY qid";
              $res = mysqli_query($con, $q);
              $i = 0;
              if($res -> num_rows > 0) {
                while (($row = $res -> fetch_assoc()) && ($i < $tq)) {
                  $qy = "SELECT cat_name, cid FROM categories WHERE cid=1";
                  $cat = $con -> query($qy);
                  $cname = $cat -> fetch_assoc();
                  echo "<tr><td>" . $row['qid'] . "</td><td>" . $row['question'] . "</td><td>" . $cname['cat_name'] . "</td></tr>";
                  $i ++;
                }
                echo "</table>";
              }
            ?>
          </table>
        </div>
        <div id="hist" class="tab-pane fade">
          <br>
          <center><table>
            <tr>
              <th>Question No</th>
              <th>Question</th>
              <th>Category</th>
            </tr>
            <?php
              $query = "SELECT * FROM variables WHERE id=1";
              $result = mysqli_query($con, $query);
              $var = mysqli_fetch_assoc($result);
              $tq = $var['totalq2'];
              $q = "SELECT * FROM questions WHERE cid=2 ORDER BY qid";
              $res = mysqli_query($con, $q);
              $i = 0;
              if($res -> num_rows > 0) {
                while (($row = $res -> fetch_assoc()) && ($i < $tq)) {
                  $qy = "SELECT cat_name, cid FROM categories WHERE cid=2";
                  $cat = $con -> query($qy);
                  $cname = $cat -> fetch_assoc();
                  echo "<tr><td>" . $row['qid'] . "</td><td>" . $row['question'] . "</td><td>" . $cname['cat_name'] . "</td></tr>";
                  $i ++;
                }
                echo "</table>";
              }
            ?>
          </table>
        </div>
        <div id="sports" class="tab-pane fade">
          <br>
          <center><table>
            <tr>
              <th>Question No</th>
              <th>Question</th>
              <th>Category</th>
            </tr>
            <?php
              $query = "SELECT * FROM variables WHERE id=1";
              $result = mysqli_query($con, $query);
              $var = mysqli_fetch_assoc($result);
              $tq = $var['totalq3'];
              $q = "SELECT * FROM questions WHERE cid=3 ORDER BY qid";
              $res = mysqli_query($con, $q);
              $i = 0;
              if($res -> num_rows > 0) {
                while (($row = $res -> fetch_assoc()) && ($i < $tq)) {
                  $qy = "SELECT cat_name, cid FROM categories WHERE cid=3";
                  $cat = $con -> query($qy);
                  $cname = $cat -> fetch_assoc();
                  echo "<tr><td>" . $row['qid'] . "</td><td>" . $row['question'] . "</td><td>" . $cname['cat_name'] . "</td></tr>";
                  $i ++;
                }
                echo "</table>";
              }
            ?>
          </table>
        </div>
      </div>
    </div>
    <br><br><br><br>
  </body>
</html>
