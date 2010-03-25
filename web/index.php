<?php
	require_once('model/AssemblyInfo.ns.php');
	
	$indexAction = new IndexAction();
	$indexAction->execute();
	
	$wiki = $indexAction->getWiki();
	$article = $indexAction->getArticle();
	
	if ($wiki == null) //Si aucune wiki, on affiche la liste des wiki
		header('Location: wikiList.php');
?>		
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//<?php echo $wiki->getLanguageName()?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $wiki->getLanguageName()?>" lang="<?php echo $wiki->getLanguageName()?>">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="language" content="<?php echo $wiki->getLanguageName()?>">
		<title>
			<?php
				echo $wiki->getTitle();
				echo " : ";
				echo $article->getTitle();
			?>
		</title>
	</head>
	<body>
		<?php
			echo MenuViewer::getHtmlCode($wiki);
			echo ArticleViewer::getHtmlCode($article);
		?>
	</body>
</html>