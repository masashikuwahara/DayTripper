<?php

//更新情報詳細 
if(isset($_POST['disp'])==true)
{
	if(isset($_POST['id'])==false)
	{
		header('Location:update_ng.php');
		exit();
	}
	$id=$_POST['id'];
	header('Location: update_disp.php?id='.$id);
	exit();
}

// 更新情報追加
if(isset($_POST['add'])==true)
{
	header('Location: update_add.php');
	exit();
}

// 更新情報修正
if(isset($_POST['edit'])==true)
{
	if(isset($_POST['id'])==false)
	{
		header('Location:update_ng.php');
		exit();
	}
	$id=$_POST['id'];
	header('Location:update_edit.php?id='.$id);
	exit();
}

//更新情報削除
if(isset($_POST['delete'])==true)
{
	if(isset($_POST['id'])==false)
	{
		header('Location:update_ng.php');
		exit();
	}
	$id=$_POST['id'];
	header('Location:pro_delete.php?id='.$id);
	exit();
}

?>