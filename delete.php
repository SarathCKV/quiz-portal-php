<?php $con = mysqli_connect('localhost', 'root', '', 'multi_login'); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Delete Page</title>
    <link rel="stylesheet" href="addstyle.css">
  </head>
  <body>
    <a href="home.php"><button type="button" name="goBack" class="btn">Go Back</button></a>
    <br><br><br><br><br>
    <center><div class="card">
      <form action="delete.php" method="post">
        <label for="uid">User ID</label>
        <input type="text" id="uid" name="uid" placeholder="Enter the user id">

        <input type="submit" value="Delete" name="delete">


        <?php
          $result = '';
          if(isset($_POST['delete'])) {
            $uid = $_POST['uid'];

            $q = "SELECT * FROM users WHERE Uid='$uid'";
            $res = mysqli_query($con, $q);
            $row = mysqli_fetch_assoc($res);

            $type = $row['user_type'];

            if($type == 'admin') {
              $result = "You cannot delete " . $row['username'] . " as he as an admin.";
            } else {
              $qy = "DELETE FROM users WHERE uid='$uid'";
              mysqli_query($con, $qy);
              $result = $row['username'] . " deleted!!";
            }
          }
        ?>
        <br><br>
        <label for="result"><?php echo $result; ?></label>
      </form>
    </div>
  </body>
</html>
