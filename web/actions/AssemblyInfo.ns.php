<?php

//Object classes
require_once("Wiki.cls.php");
require_once("Article.cls.php");
require_once("Member.cls.php");

//Static classes
require_once("EmailManager.cls.php");
require_once("ImageManager.cls.php");
require_once("LanguageManager.cls.php");
require_once("MemberManager.cls.php");
require_once("SearchManager.cls.php");
require_once("ArticleManager.cls.php");
require_once("WikiManager.cls.php");

//Viewers
require_once("viewers/ArticleViewer.cls.php");
require_once("viewers/MenuViewer.cls.php");
require_once("viewers/WikiListViewer.cls.php");

//Dao classes
require_once("dao/Dao.cls.php");
require_once("dao/DaoOracle.cls.php");

?>