<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Admin Home Page</title>
    <style>
      @import url("http://fonts.googleapis.com/css?family=Open+Sans:400,600,700");
      @import url("http://netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.css");
      *, *:before, *:after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
      }

      html, body {
        height: 100%;
      }

      body {
        font: 14px/1 'Open Sans', sans-serif;
        color: #555;
        background: #eee;
      }

      h1 {
        padding: 50px 0;
        font-weight: 400;
        text-align: center;
      }

      p {
        margin: 0 0 20px;
        line-height: 1.5;
      }

      main {
        min-width: 320px;
        max-width: 800px;
        padding: 50px;
        margin: 0 auto;
        background: #fff;
      }

	  .vertical-menu {
		  width: 200px; /* Set a width if you like */
		}

	.vertical-menu a {
	  background-color: #eee; /* Grey background color */
	  color: black; /* Black text color */
	  display: block; /* Make the links appear below each other */
	  padding: 12px; /* Add some padding */
	  text-decoration: none; /* Remove underline from links */
	  border: 1px solid #ccc;
	  border-collapse: collapse;
	}

	.vertical-menu a:hover {
	  background-color: #ccc; /* Dark grey background on mouse-over */
	}
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
</head>
<body>
  <h1>Online Quiz Portal</h1>

  <main>
	<br><br><br>
	<center><div class="vertical-menu">
	  <a href="add.php">Add Question</a>
	  <a href="viewq.php">View Questions</a>
    <a href="viewu.php">View Users</a>
	  <a href="update.php">Update Questions</a>
	  <a href="delete.php">Remove Users</a>
	  <a href="create_user.php">Add Admin/User</a>
    <a href="revive.php">View Removed User</a>
	  <a href="mainpage.php">Logout</a>
	</div>

  </main>


</body>
</html>
