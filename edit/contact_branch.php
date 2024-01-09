<?php

if(isset($_POST['disp'])==true)
{
	$id=$_POST['id'];
	header('Location: contact_disp.php?id='.$id);
	exit();
}

?>