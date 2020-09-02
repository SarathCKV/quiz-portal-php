<?php
  include('functions.php');
  if(!isLoggedIn()){
    $_SESSION['msg'] = "You must log in first";
    header('location: mainpage.php');
  }

  $con = mysqli_connect('localhost', 'root');
  mysqli_select_db($con, 'multi_login');

?>
<!DOCTYPE html>
<html>
<head>
  <title>Home</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!--<link rel="stylesheet" href="bootstrap.css">-->
</head>
<style>
  body {
    height: 250vh;
  }
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
</style>
<body>
    <?php if(isset($_SESSION['success'])) : ?>
      <div class="error success">
        <h3>
          <?php
            echo $_SESSION['success'];
            unset($_SESSION['success']);
          ?>
        </h3>
      </div>
    <?php endif ?>
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Online Quiz Portal</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">General Knowledge</a></li>
          <li><a href="hisquiz.php">History</a></li>
          <li><a href="sportquiz.php">Sports</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li><a href="mainpage.php?logout='1'"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
        </ul>
      </div>
    </nav>
    <div class="col-lg-8 m-auto d-block">
      <div class="card">
        <br>
        <br>
        <h3 class="text-center text-primary"> Welcome <?php echo $_SESSION['user']['username']; ?>, you have to select only one option </h3>
      </div>

      <form action="checked.php" method="post">

        <?php
          //$query = "SELECT COUNT(*) FROM questions";
          //$length = mysqli_query($con, $query);
          $query = "SELECT * FROM variables WHERE id=1";
          $res = mysqli_query($con, $query);
          $var = mysqli_fetch_assoc($res);
          $tq1 = $var['totalq1'];
          for($i = 1; $i < $tq1; $i++) {

          $q = "SELECT * FROM questions where qid=$i and cid=1";
          $query = mysqli_query($con, $q);

          while($rows = mysqli_fetch_array($query)) {
        ?>

        <div class="card">

            <h4 class="card-header"><?php echo $i . ".) " . $rows['question'] ?> </h4>

            <?php
              $q = "SELECT * FROM answers where qid=$i and cid=1";
              $query = mysqli_query($con, $q);

              while($rows = mysqli_fetch_array($query)) {
            ?>

            <div class="card-body">
              <input type="radio" name="quizcheck[<?php echo $rows['qid']; ?>]" value="<?php echo $rows['aid']; ?>">

              <?php echo $rows['answer']; ?>

            <?php// } ?>
            </div>

            <!--<hr class="mb-3">-->



          <?php
        }
        }
            }
          ?>

          <input type="submit" name="submit1" value="Submit" class="btn btn-outline-success m-auto d-block">
        </div>
      </form>
    </div>

</body>
</html>
