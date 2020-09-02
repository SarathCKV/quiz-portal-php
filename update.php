<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update Page</title>
    <link rel="stylesheet" href="addstyle.css">
  </head>
  <body>
    <a href="home.php"><button type="button" name="goBack" class="btn">Go Back</button></a>
    <br><br><br><br>
    <center><div class="card">
      <h2 class="display-3">Update Questions</h1>
      <form action="update.php" method="post">
        <label for="qno">Question No</label>
        <input type="text" id="qno" name="qno" placeholder="Enter the question number">

        <label for="catid">Category</label>
        <select id="catid" name="catid">
          <option value="1">General Knowledge</option>
          <option value="2">History</option>
          <option value="3">Sports</option>
        </select>

        <input type="submit" value="Get Question" name="update">

        <hr>
        <br>
      </form>


        <?php
          $con = mysqli_connect('localhost', 'root', '', 'multi_login');
          $qno = $cid = '';
          $ques = '';
          $ans = array();
          $ans1 = $ans2 = $ans3 = $ans4 = '';
          $aop = 0;
          if(isset($_POST['update'])) {
            $qno = $_POST['qno'];
            $ct = $_POST['catid'];
            $query = "SELECT * FROM questions WHERE qid='$qno' AND cid='$ct'";
            $res = mysqli_query($con, $query);
            $question = mysqli_fetch_assoc($res);
            $ques = $question['question'];

            $qy = "SELECT * FROM answers WHERE qid='$qno' AND cid='$ct'";
            $result = mysqli_query($con, $qy);
            while($row = mysqli_fetch_assoc($result)) {
              array_push($ans, $row['answer']);
            }
            $ans1 = $ans[0];
            $ans2 = $ans[1];
            $ans3 = $ans[2];
            $ans4 = $ans[3];
            $ansop = $question['ans_id'] % 4;
            if($ansop == 0) {
              $aop = 4;
            } if($ansop == 1) {
              $aop = 1;
            } if($ansop == 2) {
              $aop = 2;
            } if($ansop == 3) {
              $aop = 3;
            }
            $a = $question['ans_id'] / 4;
            $a = floor($a);
            $query = "UPDATE variables SET totalq1='$qno', totalq2='$ct', totalans='$a' WHERE id=2";
            mysqli_query($con, $query);
          }
        ?>
        <form action="update.php" method="post">
        <label for="ques">Question</label>
        <input type="text" id="ques" name="ques" placeholder="Enter the question" value="<?php echo $ques; ?>">

        <label><b>ANSWERS:</b></label>
        <br><br>

        <label for="op1">Option 1</label>
        <input type="text" id="op1" name="op1" placeholder="1st Option" value="<?php echo $ans1; ?>">

        <label for="op2">Option 2</label>
        <input type="text" id="op2" name="op2" placeholder="2nd Option" value="<?php echo $ans2; ?>">

        <label for="op3">Option 3</label>
        <input type="text" id="op3" name="op3" placeholder="3rd Option" value="<?php echo $ans3; ?>">

        <label for="op4">Option 4</label>
        <input type="text" id="op4" name="op4" placeholder="4th Option" value="<?php echo $ans4; ?>">

        <label for="ans">Which Option is the answer</label>
        <input type="text" id="ans" name="ans" value="<?php echo $aop; ?>">

        <input type="submit" value="Update" name="add">

        <?php
          if(isset($_POST['add'])) {
            $ques = $_POST['ques'];
            $op1 = $_POST['op1'];
            $op2 = $_POST['op2'];
            $op3 = $_POST['op3'];
            $op4 = $_POST['op4'];
            $ans = $_POST['ans'];

            $q = "SELECT * FROM variables WHERE id=2";
            $rest = mysqli_query($con, $q);
            $var = mysqli_fetch_assoc($rest);

            $qno = $var['totalq1'];
            $a = $var['totalans'];
            $ct = $var['totalq2'];

            $q = "UPDATE questions SET question='$ques', ans_id=('$a'*4)+'$ans' WHERE cid='$ct' AND qid='$qno'";
            $result = mysqli_query($con, $q);

            $q = "UPDATE answers SET answer='$op1' WHERE aid=('$a'*4)+1";
            $result = mysqli_query($con, $q);
            $q = "UPDATE answers SET answer='$op2' WHERE aid=('$a'*4)+2";
            $result = mysqli_query($con, $q);
            $q = "UPDATE answers SET answer='$op3' WHERE aid=('$a'*4)+3";
            $result = mysqli_query($con, $q);
            $q = "UPDATE answers SET answer='$op4' WHERE aid=('$a'*4)+4";
            $result = mysqli_query($con, $q);
          }

        ?>
      </form>
    </div>
  </body>
</html>
