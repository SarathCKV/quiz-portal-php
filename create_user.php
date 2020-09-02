<?php
  include('functions.php');
?>

<!DOCTYPE html>
<html>
<head>
  <title>Create User</title>
  <link rel="stylesheet" href="style.css" type="text/css">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    .header{
      backgroud: #003366;
    }
    button[name=register]{
      background: #003366;
    }
  </style>
</head>
<body>
  <div class="header">
    <h2>Admin - create user</h2>
  </div>

  <form method="post" action="create_user.php">

    <?php echo display_error(); ?>

    <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" value="<?php echo $username; ?>">
    </div>
    <div class="input-group">
      <label>Email</label>
      <input type="email" name="email" value="<?php echo $email; ?>">
    </div>
    <div class="input-group">
      <label>User Type</label>
      <select name="user_type" id="user_type">
        <option value="admin">Admin</option>
        <option value="user">User</option>
      </select>
    </div>
    <div class="input-group">
      <label>Password</label>
      <input type="password" name="password">
    </div>
    <div class="input-group">
      <label>Confirm Password</label>
      <input type="password" name="confpass">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="register">Create User</button>
    </div>
  </form>
</body>
</html>
