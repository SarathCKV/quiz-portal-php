
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add Question Page</title>
    <link rel="stylesheet" href="addstyle.css">
  </head>
  <body>
    <a href="home.php"><button type="button" name="goBack" class="btn">Go Back</button></a>
    <br><br><br><br>
    <center><div class="card">
      <form action="add.php" method="post">
        <label for="ques">Question</label>
        <input type="text" id="ques" name="ques" placeholder="Enter the question">

        <label for="catid">Category</label>
        <select id="catid" name="catid">
          <option value="1">General Knowledge</option>
          <option value="2">History</option>
          <option value="3">Sports</option>
        </select>

        <label style="align: left;"><b>ANSWERS:</b></label>
        <br><br>

        <label for="op1">Option 1</label>
        <input type="text" id="op1" name="op1" placeholder="1st Option">

        <label for="op2">Option 2</label>
        <input type="text" id="op2" name="op2" placeholder="2nd Option">

        <label for="op3">Option 3</label>
        <input type="text" id="op3" name="op3" placeholder="3rd Option">

        <label for="op4">Option 4</label>
        <input type="text" id="op4" name="op4" placeholder="4th Option">

        <label for="ans">Which Option is the answer</label>
        <select id="ans" name="ans">
          <option value="1">1st Option</option>
          <option value="2">2nd Option</option>
          <option value="3">3rd Option</option>
          <option value="4">4th Option</option>
        </select>

        <input type="submit" value="Submit" name="add">
        <?php
          $con = mysqli_connect('localhost', 'root', '', 'multi_login');

          $query = "SELECT * FROM variables WHERE id=1";
          $result = mysqli_query($con, $query);
          $row = mysqli_fetch_assoc($result);


          if(isset($_POST['add'])) {
            $ques = $_POST['ques'];
            $ctid = $_POST['catid'];
            $op1 = $_POST['op1'];
            $op2 = $_POST['op2'];
            $op3 = $_POST['op3'];
            $op4 = $_POST['op4'];
            $ans = $_POST['ans'];

            if($ctid == 1) {
              $tq = $row['totalq1'];
            }
            if($ctid == 2) {
              $tq = $row['totalq2'];
            }
            if($ctid == 3) {
              $tq = $row['totalq3'];
            }

            $ta = $row['totalans'];

            $query = "INSERT INTO questions (qid, question, ans_id, cid) VALUES ('$tq', '$ques', '$ta'+'$ans', '$ctid')";
            $result = mysqli_query($con, $query);

            $q = "INSERT INTO answers (aid, answer, qid, cid) VALUES ('$ta'+1, '$op1', '$tq', '$ctid')";
            mysqli_query($con, $q);
            $q = "INSERT INTO answers (aid, answer, qid, cid) VALUES ('$ta'+2, '$op2', '$tq', '$ctid')";
            mysqli_query($con, $q);
            $q = "INSERT INTO answers (aid, answer, qid, cid) VALUES ('$ta'+3, '$op3', '$tq', '$ctid')";
            mysqli_query($con, $q);
            $q = "INSERT INTO answers (aid, answer, qid, cid) VALUES ('$ta'+4, '$op4', '$tq', '$ctid')";
            mysqli_query($con, $q);


            if($ctid == 1) {
              $query = "UPDATE variables SET totalq1 = '$tq' + 1, totalans='$ta'+4 WHERE id=1";
              $result = mysqli_query($con, $query);
            }
            if($ctid == 2) {
              $query = "UPDATE variables SET totalq2 = '$tq' + 1, totalans='$ta'+4 WHERE id=1";
              $result = mysqli_query($con, $query);
            }
            if($ctid == 3) {
              $query = "UPDATE variables SET totalq3 = '$tq' + 1, totalans='$ta'+4 WHERE id=1";
              $result = mysqli_query($con, $query);
            }
          }
        ?>
      </form>
    </div>
    <br><br><br><br><br>
  </body>
</html>
