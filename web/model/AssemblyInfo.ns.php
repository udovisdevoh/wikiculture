<?php

//Actions
require_once("AbstractAction.cls.php");
require_once("IndexAction.cls.php");
require_once("EditArticleAction.cls.php");
require_once("WikiListAction.cls.php");
require_once("EditWikiAction.cls.php");

//Object classes
require_once("objectClasses/Wiki.cls.php");
require_once("objectClasses/Article.cls.php");
require_once("objectClasses/Member.cls.php");

//Static classes
require_once("managers/EmailManager.cls.php");
require_once("managers/ImageManager.cls.php");
require_once("managers/LanguageManager.cls.php");
require_once("managers/MemberManager.cls.php");
require_once("managers/SearchManager.cls.php");
require_once("managers/ArticleManager.cls.php");
require_once("managers/WikiManager.cls.php");

//Viewers
require_once("viewers/ArticleViewer.cls.php");
require_once("viewers/ArticleEditorViewer.cls.php");
require_once("viewers/MenuViewer.cls.php");
require_once("viewers/WikiListViewer.cls.php");
require_once("viewers/SearchFormViewer.cls.php");
require_once("viewers/WikiEditorViewer.cls.php");

//Dao
require_once("dao/Dao.cls.php");

error_reporting(E_ALL ^ E_NOTICE);

?>