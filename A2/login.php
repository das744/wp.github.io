<?php

if(isset($_POST['logout']))
	{
		unset($_SESSION['email']);
		unset($_SESSION['products']);
		unset($_SESSION['cart']);
		
	}
if (isset ($_POST['user']))
	{
		$userFound = False;
		if (count($_POST) > 0)
	{ 
		$users = file("customers.txt");
		for($i=0; $i< count ($users); $i++)

		{
			if($i==0)
				continue;
			$cells= explode("\t", $users[$i]);
			
			$cells[2]= trim($cells[2]);
			$cells[3]= trim($cells[3]);
	

			if ($cells[2] == $_POST['user'] && $cells[3] == $_POST['password'])
			{
				$_SESSION['email'] = $_POST['email'];
				$userFound = true;
				header("Location:index.php"); 
				$discount1 = $cells[6];
				$discount2 = $cells[7];
				$discount3 = $cells[8];
				
				$_SESSION['email'] = $_POST['user'];
				$_SESSION['products'][1]['price'] = $_SESSION['products'][1]['price'] - $_SESSION['ds1'];
				$_SESSION['products'][2]['price'] = $_SESSION['products'][2]['price'] - $_SESSION['ds1'];
				$_SESSION['products'][3]['price'] = $_SESSION['products'][3]['price'] - $_SESSION['ds1'];

				break;
			}
			
		}
		if($userFound == false)
			echo "You are not login.";
		
				
	}
	}

?>