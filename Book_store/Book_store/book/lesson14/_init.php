<?php

session_start();

include ('config.php');
//$ConnectTypetoBD='PDO';
$ConnectTypetoBD='MYSQLI';


$basicLibDir = CMS_FULL_PATH . '/lib/';
$basicLibFiles = scandir($basicLibDir);
foreach ($basicLibFiles as &$file) {
    if (substr_count($file, 'lib.php') == 1 ) {
    	include_once ($basicLibDir . $file);
    }
}
foreach ($basicLibFiles as &$file) {
    if (substr_count($file, 'class.php') == 1 ) {
        include_once ($basicLibDir . $file);
    }
}
foreach ($basicLibFiles as &$file) {
    if (substr_count($file, 'init.php') == 1 ) {
        include_once ($basicLibDir . $file);
    }
}


$mySite = new Site();

$mySite->addCSSFile (CMS_BASE_URL . '/css/bootstrap.min.css');

$mySite->addJSFile (CMS_BASE_URL . '/js/jquery-3.1.1.slim.min.js');
$mySite->addJSFile (CMS_BASE_URL . '/js/tether.min.js');
$mySite->addJSFile (CMS_BASE_URL . '/js/popper.min.js');
$mySite->addJSFile (CMS_BASE_URL . '/js/bootstrap.min.js');


$mySite->addCSSFile (CMS_BASE_URL . '/css/style.css');
$mySite->addJSFile (CMS_BASE_URL . '/js/script.js');

$curUser = new User_Controller($ConnectTypetoBD);

$myMenu = new Menu ($ConnectTypetoBD);
$myMenu->addMenuItem ('Главная', CMS_BASE_URL . '');
$myMenu->addMenuItem ('Книги', CMS_BASE_URL . 'books/');
$myMenu->addMenuItem ('Корзина', CMS_BASE_URL . 'cart/');

$myMenu->addMenuItem ('Личый кабинет', CMS_BASE_URL . '');
  $myMenu->addMenuItem ('Заказы', CMS_BASE_URL . 'cart/', '3');
  $myMenu->addMenuItem ('Лайки', CMS_BASE_URL . 'likes/', '3');

$myMenu->addMenuItem ('Обо мне', CMS_BASE_URL . '');

$myMenu->getJanreMenu($ConnectTypetoBD);
for ($i = 1; $i <= 4; $i++ ){
  $name=$myMenu->echoJanreName($i);

  $url=$myMenu->echoJanreUrl($i);

  $myMenu->addMenuItem ($name, CMS_BASE_URL . $url, '2');
}

$AdminMenu = new Menu ($ConnectTypetoBD);
$AdminMenu->addMenuItem ('Админка', CMS_BASE_URL . '');
$AdminMenu->addMenuItem ('Быстрый Просмотр асортимента', CMS_BASE_URL . 'adminka/ajax/', '1');
$AdminMenu->addMenuItem ('Добавить книгу', CMS_MODULES_PATH . 'orders/', '1');
$AdminMenu->addMenuItem ('Удалить енигу', CMS_MODULES_PATH . 'orders/', '1');
