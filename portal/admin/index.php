
<?php
	error_reporting(0);
      session_start();
      include_once '../nitsadb.php';

      if(isset($_REQUEST['admsubmit']))
      {
          
          $result=executeQuery("select * from admin where admname='".htmlspecialchars($_REQUEST['name'],ENT_QUOTES)."' and admpass='".md5(htmlspecialchars($_REQUEST['password'],ENT_QUOTES))."'");
        
         // $result=mysql_query("select * from adminlogin where admname='".htmlspecialchars($_REQUEST['name'])."' and admpassword='".md5(htmlspecialchars($_REQUEST['password']))."'");
          if(mysql_num_rows($result)>0)
          {
              
              $r=mysql_fetch_array($result);
              if(strcmp($r['admpass'],md5(htmlspecialchars($_REQUEST['password'],ENT_QUOTES)))==0)
              {
                  $_SESSION['admname']=htmlspecialchars_decode($r['admname'],ENT_QUOTES);
                  unset($_GLOBALS['message']);
                  header('Location: admwelcome.php');
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
	<title>Administrator Portal</title>
  
      <link rel="stylesheet" href="../css/style.css">
 
</head>

<body>
	
    	<?php
      
        if(isset($_GLOBALS['message']))
        {
         echo "<div class=\"message\">".$_GLOBALS['message']."</div>";
        }
      ?>
  <div class="wrapper">
	<div class="container">
		<h1>Admin Login</h1>
            	
            	
		<form class="form" action="index.php" method="post">
			<input type="text" tabindex="1" placeholder="Username">
			<input type="password" tabindex="2" placeholder="Password">
			<button type="submit" tabindex="3" id="login-button">Login</button>
					</form>
            
	</div>
	
	<ul class="bg-bubbles">
		
	</ul>
</div>
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script src="../js/index.js"></script>

</body>
</html>