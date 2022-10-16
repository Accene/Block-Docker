<?php
//connexion à la BD
$pdo = new PDO("mysql:host=databaseBlog:3306;dbname=data","root","password")
$articles = $pdo->query('SELECT * FROM articles ORDER BY jour DESC');
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title>Hetic DockerBlog - Blog</title>
</head>
<body>
    <header>
        <div class ="logo">
        <h1><span>HETIC</span> DockerBlog</h1> 
        </div>
    </header>

    <section class="one">
        <h2>
            Article
        </h2>
    </section>

    <section class="article">
        <ul>
            <?php while($a = $articles->fetch()) { ?>
            <li><a href="article.php?id=<?= $a['id'] ?>"><?= $a['titre'] ?></a></li>
            <?php } ?>
        <ul>
    </section>  
</body>
</html>