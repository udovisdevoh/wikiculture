<?php
	require_once('model/AssemblyInfo.ns.php');

	$logoutAction = new LogoutAction();
	$logoutAction->execute();

	//header('Location: '.urldecode($_GET['referrer']));
	$logoutAction->forward(urldecode($_GET['referrer']));