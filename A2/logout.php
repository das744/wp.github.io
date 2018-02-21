<?php
		unset($_SESSION['email']);
		unset($_SESSION['products']);
		unset($_SESSION['cart']);
?>

<?php include ('toppage.php');?>

<title>Aussie Bakery House</title>


<?php include ('middlepage.php');?>

</br></br><div style= "text-align:center; color:white;"><h1> YOU ARE LOGOUT. THANKS FOR VISTING US.</h1></div>
<?php include ('endpage.php');?>