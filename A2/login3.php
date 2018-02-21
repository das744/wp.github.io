

<?php include ('toppage.php');?>
<title>Aussie Bakery House</title>
<?php include ('middlepage.php');?>
<div id= "whiteboxA">

<?php

	include('loginlogout.php');
	


?>
          <form method = "post" action="" id="index">
	      <p>Username:<br/> <input type='text' name='user' value=''/></p>
          <p>Password:<br/> <input type='password' name='password' value=''></p>
          <p><input type='submit' value='login' name='Login'></p>
          </form>  


</div>	
</div>
<?php include ('endpage.php');?>


