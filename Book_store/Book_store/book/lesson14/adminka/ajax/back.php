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

$sql_authors = 'SELECT * FROM `autors` ';

$sth = $dbh->prepare($sql_authors);
$sth->execute();
$authors = $sth->fetchAll(PDO::FETCH_ASSOC);

echo '<pre>' . __FILE__ . '(' . __LINE__ . ')';//zzz
echo PHP_EOL . '  = ' . htmlspecialchars(var_export($authors, true), 3, 'UTF-8');
echo '</pre>';
