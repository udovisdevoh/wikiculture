<?php
	require_once('model/AssemblyInfo.ns.php');

	$subscribeAction = new SubscribeAction();
	$subscribeAction->execute();
	
	$member = $subscribeAction->getMember();

	if ($member->getEmailAddress() != null && $member->getEmailAddress() != "")
	{
		//header('Location: '.urldecode($_GET['referrer']));
		$subscribeAction->forward(urldecode($_GET['referrer']));		
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="EN" lang="EN">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
		<title>
			WikiCulture - Login
		</title>
	</head>
	<body>
		<?php
			if (is_array($subscribeAction->getMessageList()))
				foreach ($subscribeAction->getMessageList() as $message)
					echo '<p>'.$message.'</p>';
		?>
	
		<?php
			echo MemberViewer::getHtmlCode($member);
		?>
	</body>
</html>
