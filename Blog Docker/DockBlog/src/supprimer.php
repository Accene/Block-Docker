<?php
//connexion à la BD
$pdo = new PDO("mysql:host=databaseBlog:3306;dbname=data","root","password")
if(isset($_GET['id']) AND !empty($_GET['id'])) {
    $suppr_id = htmlspecialchars($_GET['id']);
    $suppr = $pdo->prepare('DELETE FROM articles WHERE id = ?');
    $suppr->execute(array($suppr_id));
    header('Location: localhost:2345/src/Articles/');
}
?>