<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="UTF-8">
    <title>Is my password on a password list?</title>
    <meta name="description" content="Is my password on a list? Is a security test which allows you to check if one of your password is on a password list containing 10 million passwords used by many hackers to hack your account in seconds!" />
    <link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="css/main.css" />
		<link rel="stylesheet" type="text/css" href="css/form.css" />

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</head>

<body>
  <div class="container">

    <div class="codrops-header" id="headerdiv">
      <div class="aligncenter">
        <h1>Is my password on a list? <span>Check if your password has been leaked on a password list.</span></h1>
        <nav class="codrops-demos">
          <a href="index.php" class="current-demo">Tool</a>
          <a href="secure.php">Is it safe?</a>
        </nav>
      </div>
    </div>

    <div class="content bgcolor" id="contentdiv">
      <div class="aligncenter">
        <h2 id="task">Check your password</h2>
      <form method="post" action="" class="input input--kozakura">
        <input class="input__field input__field--kozakura" type="password" id="input-8" name="password" autocomplete="off"/>
        <label class="input__label input__label--kozakura" for="input-8">
          <span class="input__label-content input__label-content--kozakura" data-content="Password">Password</span>
        </label>
        <svg class="graphic graphic--kozakura" width="300%" height="100%" viewBox="0 0 1200 60" preserveAspectRatio="none">
          <path d="M1200,9c0,0-305.005,0-401.001,0C733,9,675.327,4.969,598,4.969C514.994,4.969,449.336,9,400.333,9C299.666,9,0,9,0,9v43c0,0,299.666,0,400.333,0c49.002,0,114.66,3.484,197.667,3.484c77.327,0,135-3.484,200.999-3.484C894.995,52,1200,52,1200,52V9z"/>
        </svg>
      </form>
      </div>
    </div>

<!-- php begin -->
<?php
    $password = $_POST['password'];
    $passlist1 = file("10million.txt");
	  
    if(empty($_POST['password'])) {
      $found = "emptypass";
    }

    if(!empty($_POST['password'])) {
      if(in_array($password."\n", $passlist1)){
          $found = "yep";
      } else {
          $found = "nope";
      }
    }
?>
<!-- php end -->

<script>
//php variable value
var found = "<?php echo $found; ?>";
if (found == "yep") {
  $("#contentdiv").addClass("passfoundbg");
  $('#task').html('Your password is on a password list! <br />Change it immediately!');
} else if (found == "nope") {
  $("#contentdiv").addClass("passnotfoundbg");
  $('#task').html('Your password isn\'t on a password list :)');
}
</script>
</div>
</body>
</html>
