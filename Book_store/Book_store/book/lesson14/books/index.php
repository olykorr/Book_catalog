<?php

include ('../_init.php');

$ConnectTypetoBD='MYSQLI';
//$ConnectTypetoBD='PDO';
$books = new Books_Controller ($ConnectTypetoBD);


$mySite->start();
echo $myMenu->getMenu();
echo "at books/index.php <br>".PHP_EOL;
$books->buildBooksList();

$mySite->end ();
