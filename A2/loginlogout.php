<?php
	
	$_SESSION['products']=array (1 => array("name"=>"Mini Pavolova", "price" => 3.90,
							   2 => array("name"=>"Jam Ball Donut", "price" => 3.00,
							   3 => array("name"=>"Strwberry Donut", "price" => 3.30,))));
							   
if(isset($_SESSION['email']))
{
	$_SESSION['products'][1]["price"] = $_SESSION['products'][1]["price"] - $_SESSION['products'][1]["price"]*$discount1/100;
	$_SESSION['products'][1]["price"] = $_SESSION['products'][2]["price"] - $_SESSION['products'][2]["price"]*$discount2/100;
	$_SESSION['products'][1]["price"] = $_SESSION['products'][3]["price"] - $_SESSION['products'][3]["price"]*$discount3/100;
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
	
			if ($cells[2] == $_POST['user'] && $cells[4] == ($_POST['password']))
			{
				$_SESSION['email'] = $_POST['user'];
				$userFound = true;
				
				
				$discount1 = $cells[6];
				$discount2 = $cells[7];
				$discount3 = $cells[8];
						
				$_SESSION['products'][1]["price"] = $_SESSION['products'][1]["price"] - $_SESSION['products'][1]["price"]*$discount1/100;
				$_SESSION['products'][2]["price"] = $_SESSION['products'][2]["price"] - $_SESSION['products'][2]["price"]*$discount2/100;
				$_SESSION['products'][3]["price"] = $_SESSION['products'][3]["price"] - $_SESSION['products'][3]["price"]*$discount3/100;
						
								
				header("Location:index.php");
			}
				
				
		if($userFound == false)
			echo "You are not login.";
		
				
	}
}
}
?>


