<?php

include ('_init.php');

$books = new Books_Controller ($ConnectTypetoBD);
$mySite->start();
echo $myMenu->getMenu();


echo $curUser->getLoginForm();

//echo $curUser->getRegisterForm();
//echo $curUser->getEditForm();
echo '$this->userLogin='.$curUser->userLogin;


$mySite->end();
