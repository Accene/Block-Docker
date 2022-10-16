<?php
//connexion à la BD
$pdo = new PDO("mysql:host=databaseBlog:3306;dbname=data","root","password")
if(isset($_GET['edit']) AND !empty($_GET['edit'])) {
   $mode_edition = 1;
   $edit_id = htmlspecialchars($_GET['edit']);
   $edit_article = $pdo->prepare('SELECT * FROM articles WHERE id = ?');
   $edit_article->execute(array($edit_id));
   if($edit_article->rowCount() == 1) {
      $edit_article = $edit_article->fetch();
   } else {
      die('Erreur : l\'article n\'existe pas...');
   }
}
if(isset($_POST['article_titre'], $_POST['article_contenu'])) {
   if(!empty($_POST['article_titre']) AND !empty($_POST['article_contenu'])) {
      
      $article_titre = htmlspecialchars($_POST['article_titre']);
      $article_contenu = htmlspecialchars($_POST['article_contenu']);
      if($mode_edition == 0) {
         $ins = $pdo->prepare('INSERT INTO articles (titre, contenu, jour) VALUES (?, ?, NOW())');
         $ins->execute(array($article_titre, $article_contenu));
         $message = 'Votre article a bien été posté';
      } else {
         $update = $pdo->prepare('UPDATE articles SET titre = ?, contenu = ?, date_time_edition = NOW() WHERE id = ?');
         $update->execute(array($article_titre, $article_contenu, $edit_id));
         header('Location: localhost:2345/src/article.php?id='.$edit_id);
         $message = 'Votre article a bien été mis à jour !';
      }
   } else {
      $message = 'Veuillez remplir tous les champs';
   }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="">
    <title></title>
</head>
<body>
    <header>
        <div class ="logo">
        <h1><span>HETIC</span> DockerBlog</h1> 
        </div>
    </header>

    <section class="redac">
        <form class="redaction">
            <input type="text" name="article_titre" placeholder="Titre"<?php if($mode_edition == 1) { ?> value="<?=
            $edit_article['titre'] ?>"<?php } ?> /><br />
            <textarea name="article_contenu" placeholder="Contenu de l'article"><?php if($mode_edition == 1) { ?><?=
            $edit_article['contenu'] ?><?php } ?></textarea><br />
            <input type="submit" value="Envoyer l'article" />
        </form>
        <br/>
        <?php if(isset($message)) { echo $message; } ?>
    </section> 
</body>
</html>