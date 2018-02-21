
<?php include ('toppage.php');?>

<title>Aussie Bakery House</title>

<?php include ('middlepage.php');?>

</br></br><div style= "text-align:center; color:white;"><h1> There are all sites in this website.</h1>

<?php

	$a = scandir(".");
	$regex = " /.html|.php/ ";
	foreach ($a as $list)
	{
		if ( preg_match ($regex, $list))
		echo "$list <br/>";
	}
?>


</div>

<?php include ('endpage.php');?>