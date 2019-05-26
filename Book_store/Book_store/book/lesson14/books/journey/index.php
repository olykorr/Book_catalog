<?php

include ('../../_init.php');

// Start work whith books

$books = new Books_Controller ($ConnectTypetoBD);


$mySite->start();
echo $myMenu->getMenu();
echo "at books/index.php <br>".PHP_EOL;
$books->buildBooksList(1,'');

$mySite->end ();
