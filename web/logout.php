<?php
	require_once('model/AssemblyInfo.ns.php');

	$logoutAction = new LogoutAction();
	$logoutAction->execute();

	//header('Location: ./');
	require_once("index.php");
	die();