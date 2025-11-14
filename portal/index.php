
<?php
	error_reporting(0);
      session_start();
      include_once 'nitsadb.php';

      if(isset($_REQUEST['stdsubmit']))
      {

          $result=executeQuery("select *,DECODE(stdpass,'nitsapass') as std from stddata where stdname='".htmlspecialchars($_REQUEST['username'],ENT_QUOTES)."' and stdpass=ENCODE('".htmlspecialchars($_REQUEST['password'],ENT_QUOTES)."','nitsapass')");
          if(mysql_num_rows($result)>0)
          {

              $r=mysql_fetch_array($result);
              if(strcmp(htmlspecialchars_decode($r['std'],ENT_QUOTES),(htmlspecialchars($_REQUEST['password'],ENT_QUOTES)))==0)
              {
                  $_SESSION['username']=htmlspecialchars_decode($r['username'],ENT_QUOTES);
                  $_SESSION['stdid']=$r['stdid'];
                  unset($_GLOBALS['message']);
                  header('Location: stdwelcome.php');
              }else
          {
              $_GLOBALS['message']="Check Your user name and Password.";
          }

          }
          else
          {
              $_GLOBALS['message']="Check Your user name and Password.";
          }
          closedb();
      }
 ?>


<!DOCTYPE html>
<html >
<head>
	<meta http-equiv="content-type" content="text/html" charset="UTF-8">
	<title>NITSA PORTAL</title>
  
      <link rel="stylesheet" href="css/style.css">
 
</head>

<body>
    
  <div class="wrapper">
	<div class="container">
		<h1>Student Login Portal</h1>
			<p style="font-size:16px; font-weight:bold; text-transform:uppercase;">
			
			<?php
			if($_GLOBALS['message'])
			{
				echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
			}
	?>
            	</p>
            	
		<form class="form" action="index.php" method="post">
			<input type="text" tabindex="1" placeholder="Username">
			<input type="password" tabindex="2" placeholder="Password">
			<button type="submit" tabindex="3" id="login-button" name="stdsubmit">Login</button>

             <?php 
				if (isset($_SESSION['stdname'])){
					header('Location: stdwlcome.php');
				}
			?>       
            </form>
	</div>
	
	<ul class="bg-bubbles">
		<li>NISTA</li>
		<li>NISTA</li>
		<li>NITSA</li>
		<li>NITSA</li>
		<li>NITSA</li>
		<li>NITSA</li>
		<li>NITSA</li>
		<li>NITSA</li>
		<li>NITSA</li>
		<li>NITSA</li>
	</ul>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="js/index.js"></script>

</body>
</html>