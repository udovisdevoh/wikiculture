<?php

//Actions
require_once("AbstractAction.cls.php");
require_once("IndexAction.cls.php");

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
require_once("viewers/MenuViewer.cls.php");
require_once("viewers/WikiListViewer.cls.php");

//Dao
require_once("dao/Dao.cls.php");

?>