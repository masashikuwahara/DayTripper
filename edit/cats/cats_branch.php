<?php

//城詳細 
if(isset($_POST['disp']) === true)
{
	if(isset($_POST['id']) === false)
	{
		header('Location:cats_ng.php');
		exit();
	}
	$id=$_POST['id'];
	header('Location: cats_disp.php?id='.$id);
	exit();
}

// 城追加
if(isset($_POST['add']) === true)
{
	header('Location: cats_add.php');
	exit();
}

// 城修正
if(isset($_POST['edit']) === true)
{
	if(isset($_POST['id']) === false)
	{
		header('Location:cats_ng.php');
		exit();
	}
	$id=$_POST['id'];
	header('Location:cats_edit.php?id='.$id);
	exit();
}

//城削除
if(isset($_POST['delete']) === true)
{
	if(isset($_POST['id']) === false)
	{
		header('Location:cats_ng.php');
		exit();
	}
	$id=$_POST['id'];
	header('Location:pro_delete.php?id='.$id);
	exit();
}

?>