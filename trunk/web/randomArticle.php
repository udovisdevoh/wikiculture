<?php
	require_once('classes/AssemblyInfo.ns.php');
	$wiki = WikiManger::getWikiFromTitle($_GET['wiki_title']); //Objet de type Wiki
	$article = ArticleManager::getRandomArticle($wiki); //Objet de type article
?>		
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//<?php echo $wiki->getLanguageName()?>" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $wiki->getLanguageName()?>" lang="<?php echo $wiki->getLanguageName()?>">
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="language" content="<?php echo $wiki->getLanguageName()?>">
		<title>
			<?php echo $wiki->getTitle()." : ".$article->getTitle()?>
		</title>
	</head>
	<body>
		<?php
			if ($wiki == null || $article == null) //Si aucune wiki, on affiche la liste des wiki
			{
				JavaScript::forward("wikiList.php");
			}
			else //Sinon, on affiche le wiki
			{
				JavaScript::forward("./?wiki_title=".$wiki->getTitle()."&article_title=".$article->getTitle());
			}
		?>
	</body>
</html>