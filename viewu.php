<?php
  $con = mysqli_connect('localhost', 'root', '', 'multi_login');
      $query = "CALL v_users";
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
      <h2 class="display-3">Users</h2>

          <center><table>
            <tr>
              <th>User Id</th>
              <th>Username</th>
              <th>Usertype</th>
                <th>Email</th>
            </tr>

              <?php
              foreach ($row as $r){

                  echo "<tr><td>" . $r['Uid'] . "</td><td>" . $r['username'] . "</td><td>" . $r['user_type'] . "</td><td>". $r['email'] . "</td></tr>";

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
