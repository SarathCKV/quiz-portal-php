<?php
  session_start();

  $con = mysqli_connect('localhost', 'root');

  $db = mysqli_select_db($con, 'multi_login');

  if(isset($_GET['logout'])){
    session_destroy();
    unset($_SESSION['user']);
    header("location: login.php");
  }

  if(isset($_POST['submit1'])) {
    $cid = 1;
    $qy = "SELECT * FROM variables WHERE id=1";
    $rst = mysqli_query($con, $qy);
    $var = mysqli_fetch_assoc($rst);
    $tq = $var['totalq1'] - 1;
  }

  if(isset($_POST['submit2'])) {
    $cid = 2;
    $qy = "SELECT * FROM variables WHERE id=1";
    $rst = mysqli_query($con, $qy);
    $var = mysqli_fetch_assoc($rst);
    $tq = $var['totalq2'] - 1;
  }

  if(isset($_POST['submit3'])) {
    $cid = 3;
    $qy = "SELECT * FROM variables WHERE id=1";
    $rst = mysqli_query($con, $qy);
    $var = mysqli_fetch_assoc($rst);
    $tq = $var['totalq3'] - 1;
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Result Page</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="bootstrap.css">
</head>
<style>
  nav a:hover{
			background: purple;
			transition: 0.5s;
			text-transform: none;
		}

  .m-auto {
    margin: auto !important;
  }

  .d-block {
    display: block !important;
  }

  .card {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.125);
    border-radius: 0.25rem;
  }

  .card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: rgba(0, 0, 0, 0.03);
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
  }

  .card-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem;
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
  body {
    font-size: 20px;
  }
  nav {
    font-size: 15px;
  }
  table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
    padding: 15px;
    text-align: left;
  }
  .btn-outline-secondary {
    position: relative;
    left: 450px;
    padding: 5px;
  }
  .left {
    position: relative;
    left: -650px;
    padding: 5px;
  }
</style>
<body>
  <!--<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor02">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">About</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search">
      <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>-->

  <div class="container text-center">
    <br><br>
    <h1 class="text-center text-success text-uppercase">Online quiz Portal</h1><br>

    <table class="table text-center table-table-bordered table-hover">
      <tr>
        <th colspan="2" class="bg-dark"><h1 class="text-white"> Results </h1></th>
      </tr>
      <tr>
        <td>
          Questions Attempted
        </td>

        <?php
          $result = 0;
          $qy = "SELECT * FROM variables WHERE id=1";
          $rst = mysqli_query($con, $qy);
          $var = mysqli_fetch_assoc($rst);
          $tq1 = $var['totalq1'] - 1;
          $tq2 = $var['totalq2'] - 1;
          $tq3 = $var['totalq3'] - 1;
          if(isset($_POST['submit1'])) {
            if(!empty($_POST['quizcheck'])) {
              $checked_count = count($_POST['quizcheck']);
        ?>

        <td>
          <?php echo "Out of " . $tq . ", You have attempted " . $checked_count . " options"; ?>
        </td>

        <?php
          $selected = $_POST['quizcheck'];

          $q = "SELECT * FROM questions where cid='$cid' ORDER BY qid";
          $ansresults = mysqli_query($con, $q);
          $i = 1;
          while($rows = mysqli_fetch_array($ansresults)) {
            if($rows['ans_id'] == $selected[$i++]) {
              $result++;
            }
          }
        ?>

        <tr>
          <td>
            Your total score
          </td>
          <td colspan="2">
            <?php
              echo "Your score is " . $result;
            }
            else {
              echo "<br>Please select atleast one option";
            }
          }




          if(isset($_POST['submit2'])) {
            if(!empty($_POST['quizcheck'])) {
              $checked_count = count($_POST['quizcheck']);
        ?>

        <td>
          <?php echo "Out of " . $tq . ", You have attempted " . $checked_count . " options"; ?>
        </td>

        <?php
          $selected = $_POST['quizcheck'];

          $q = "SELECT * FROM questions where cid=2";
          $ansresults = mysqli_query($con, $q);
          $i = 1;
          while($rows = mysqli_fetch_array($ansresults)) {
            if($rows['ans_id'] == $selected[$i++]) {
              $result++;
            }
          }
        ?>

        <tr>
          <td>
            Your total score
          </td>
          <td colspan="2">
            <?php
              echo "Your score is " . $result;
            }
            else {
              echo "<br>Please select atleast one option";
            }
          }




          if(isset($_POST['submit3'])) {
            if(!empty($_POST['quizcheck'])) {
              $checked_count = count($_POST['quizcheck']);
        ?>

        <td>
          <?php echo "Out of " . $tq . ", You have attempted " . $checked_count . " options"; ?>
        </td>

        <?php
          $selected = $_POST['quizcheck'];

          $q = "SELECT * FROM questions where cid=3";
          $ansresults = mysqli_query($con, $q);
          $i = 1;
          while($rows = mysqli_fetch_array($ansresults)) {
            if($rows['ans_id'] == $selected[$i++]) {
              $result++;
            }
          }
        ?>

        <tr>
          <td>
            Your total score
          </td>
          <td colspan="2">
            <?php
              echo "Your score is " . $result;
            }
            else {
              echo "<br>Please select atleast one option";
            }
          }
            ?>
          </td>
        </tr>

        <?php
          $name = $_SESSION['user']['username'];
          $finalresult = "INSERT INTO user(username, totalques, answerscorrect, cid, attemptedon) VALUES ('$name', '$tq', '$result', '$cid', NOW())";
          $queryresult = mysqli_query($con, $finalresult);
        ?>
      </table>
      <br>
      <br>
      <a href="mainpage.php?logout='1'" style="color: red;"><button class="btn btn-outline-success">Logout</button></a>
      <a href="highscore.php"><button type="button" class="btn btn-outline-secondary">Check Highscore</button></a>
      <a href="index.php"><button type="button" class="btn btn-outline-secondary left">Take Quiz Again</button></a>
  </div>



</body>
</html>
