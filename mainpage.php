<?php
  include('functions.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign In/ Sign Up</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="loginpage.css">
</head>
<body>
    <div class="container" id="container">
        <?php echo display_error(); ?>
        <div class="form-container sign-up-container">
            <form action="mainpage.php" method="post">
                <h1>Create Account</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your email for registration</span>
                <input type="text" placeholder="Name" name="username" value="<?php echo $username; ?>">
                <input type="email" placeholder="Email" name="email" value="<?php echo $email ?>">
                <input type="password" placeholder="Password" name="password">
                <input type="password" placeholder="Confirm Password"name="confpass">
                <button type="submit" name="register">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in-container">
            <form action="mainpage.php" method="post">
                <h1>Sign In</h1>
                <div class="social-container">
                    <a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
                    <a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
                </div>
                <span>or use your account</span>
                <input type="email" placeholder="Email" name="loginemail">
                <input type="password" placeholder="Password" name="loginpass">
                <a href="#">Forgot your Password?</a>
                <button type="submit" name="login">Sign In</button>
            </form>
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>
                        To keep connected with us please login with your personal info
                    </p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                  <h1>Online Quiz Portal</h1>
                    <p>
                        Enter your personal details and start your journey with us
                    </p>

                    <button class="ghost" id="signUp">Sign Up</button><br><br>
                    <p>
                      Designed by,<br><br>
                      Sarath Chandra KV<br>
                      Chethan R.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="main.js"></script>
</body>
</html>
