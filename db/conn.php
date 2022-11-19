<?php 
$host = "127.0.0.1";
$db = "attendance_db";
$user = "root";
$pass = '';
$charset = "utf8mb4";


//Hosting
$host = 'applied-web.mysql.database.azure.com';
//$db = 'glassford_beckfordattendance_db';
$db = 'gbeckford';
$user = 'appliedweb_user@applied-web';
$pass = 'P@ssword1';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
try{
    $pdo = new PDO($dsn, $user, $pass);
    echo "Hello Database";


} catch(PDOException $e) {
    throw new PDOException($e->getMessage());
}

require_once 'crud.php';
require_once 'user.php';
 $crud = new crud($pdo);
 $user = new user($pdo);

 //$user->insertUser("admin", "password");
?>
