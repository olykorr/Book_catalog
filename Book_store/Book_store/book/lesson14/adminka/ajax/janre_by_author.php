<?php
//$data = json_decode(file_get_contents('data.json'), true);
$dsn = 'mysql:host=localhost;dbname=store';
$user = 'root';
$password = '';

try {
	$dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
	echo 'Подключение не удалось: ' . $e->getMessage();
}

$autorID = 0;
if (!empty($_GET['autorID']) and 0 < (int)$_GET['autorID']) {
	$autorID = (int)$_GET['autorID'];
}
if (!$autorID) {
    return '';
}

$sql_authors = 'SELECT DISTINCT j.*
	FROM `janre` j
	LEFT JOIN `books_janre` bj ON (j.janreID = bj.janreID)
	LEFT JOIN `books_autor` ba ON (ba.bookID = bj.bookID)
	WHERE ba.autorID = :autorID
';

$sth = $dbh->prepare($sql_authors);
$sth->execute([':autorID' => $autorID]);
$authors = $sth->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($authors);
