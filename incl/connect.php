<?
$hostname = 'localhost';
$dbname = 'market';
$username = 'root';
$password = '';


try {
    $connect = new PDO("mysql:host=$hostname;charset=utf8;dbname=$dbname", $username, $password);
} catch (PDOException $e) {
    echo 'Ошибка: ' . $e->getMessage();
}
