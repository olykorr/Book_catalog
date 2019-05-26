<?php
//$data = json_decode(file_get_contents('data.json'), true);
$dsn = 'mysql:dbname=olya_ajax;host=127.0.0.1';
$user = 'root';
$password = '';

try {
	$dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
	echo 'Подключение не удалось: ' . $e->getMessage();
}

$sql_authors = 'SELECT * FROM `autors` ';

$sth = $dbh->prepare($sql_authors);
$sth->execute();
$authors = $sth->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($authors);



//$item_in_page = 6;
//$page = 1;
//if (!empty($_GET['page']) and 0 < (int)$_GET['page']) {
//	$page = (int)$_GET['page'];
//}
//
//$respond = [];
//
//if (($page - 1) * $item_in_page < count($data)) {
//	$respond = array_slice($data, ($page - 1) * $item_in_page, $item_in_page);
//}
//sleep(1); // добавил чтобы имитировать задержку ответа :)
//
//echo json_encode($respond);