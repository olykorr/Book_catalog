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

$janreID = 0;
if (!empty($_GET['janreID']) and 0 < (int)$_GET['janreID']) {
	$janreID = (int)$_GET['janreID'];
}
if (!$autorID) {
    return '';
}

if ($janreID) {
	$sql_authors = 'SELECT DISTINCT b.*
	FROM `books` b
		LEFT JOIN `books_janre` bj ON (b.bookID = bj.bookID)
		LEFT JOIN `books_autor` ba ON (b.bookID = ba.bookID)
	WHERE
		ba.autorID = :autorID AND bj.janreID = :janreID
';

	$sth = $dbh->prepare($sql_authors);
	$sth->execute([':autorID' => $autorID, ':janreID' => $janreID]);
	$books = $sth->fetchAll(PDO::FETCH_ASSOC);
} else {
	$sql_authors = 'SELECT DISTINCT b.*
	FROM `books` b
		LEFT JOIN `books_autor` ba ON (b.bookID = ba.bookID)
	WHERE
		ba.autorID = :autorID
';

	$sth = $dbh->prepare($sql_authors);
	$sth->execute([':autorID' => $autorID]);
	$books = $sth->fetchAll(PDO::FETCH_ASSOC);
}

echo json_encode($books);
