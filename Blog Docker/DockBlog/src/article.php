<?php
//connexion à la BD
$pdo = new PDO("mysql:host=databaseBlog:3306;dbname=data","root","password")

if(isset($_GET['id']) AND !empty($_GET['id'])) {
    $get_id = htmlspecialchars($_GET['id']);
    $article = $pdo->prepare('SELECT * FROM articles WHERE id = ?');
    $article->execute(array($get_id));
    if($article->rowCount() == 1) {
       $article = $article->fetch();
       $titre = $article['titre'];
       $contenu = $article['contenu'];
    } else {
       die('Cet article n\'existe pas !');
    }
 } else {
    die('Erreur');
 }
?>

<!DOCTYPE html>
<html>
<head>
   <title>Accueil</title>
   <meta charset="utf-8">
</head>
<body>
<header>
    <div class ="logo">
        <h1><span>HETIC</span> DockerBlog</h1> 
    </div>
</header>
   <h1><?= $titre ?></h1>
   <p><?= $contenu ?></p>
</body>
</html>