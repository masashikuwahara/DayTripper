<?php

if(isset($_POST['disp'])==true)
{
	if(isset($_POST['id'])==false)
	{
		header('Location:contact_ng.php');
		exit();
	}
	$id=$_POST['id'];
	header('Location: contact_disp.php?id='.$id);
	exit();
}

if(isset($_POST['con'])==true)
{
	header('Location: contact_check.php');
	exit();
}

?>