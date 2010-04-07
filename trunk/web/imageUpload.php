<?php
	require_once('model/AssemblyInfo.ns.php');
	
	$imageUploadAction = new ImageUploadAction();
	$imageUploadAction->execute();
	
	$wiki = $imageUploadAction->getWiki();
	
	if ($wiki == null) //Si aucune wiki, on affiche la liste des wiki
	{
		//header('Location: wikiList.php');
		require_once("wikiList.php");
		die();
	}
?>		
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $wiki->getLanguageName()?>" lang="<?php echo $wiki->getLanguageName()?>">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="language" content="<?php echo $wiki->getLanguageName()?>" />
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
		<title>
			<?php echo $wiki->getTitle() ?>
		</title>
	</head>
	<body>
		<?php
			echo LeftMenuViewer::getHtmlCode($wiki, $article);
			echo TopMenuViewer::getHtmlCode($wiki, $article);
			echo ImageUploadViewer::getHtmlCode($wiki);
		?>
	</body>
</html>