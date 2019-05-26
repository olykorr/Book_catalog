 <?php

include ('../_init.php');

//$ConnectTypetoBD='PDO';
$ConnectTypetoBD='MYSQLI';

$adminka = new Admin_Controller ($ConnectTypetoBD);


$mySite->start();
echo '<hr>';
$adminka->buildBookAdd();
$mySite->end ();
