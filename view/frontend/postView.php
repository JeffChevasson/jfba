<?php ob_start(); ?>
<h1>Blog de Jean Forteroche</h1>

<!DOCTYPE html>
<html lang="fr">

<head>

<meta charset="utf-8">
<meta name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="">
<meta name="author" content="">

<title><?php $title = htmlspecialchars($post['title']); ?></title>

<!-- Bootstrap core CSS -->
<link href="public/vendor/bootstrap/css/bootstrap.min.css"
    rel="stylesheet">

<!-- Custom fonts for this template -->
<link href="public/vendor/font-awesome/css/font-awesome.min.css"
    rel="stylesheet" type="text/css">
<link
    href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic'
    rel='stylesheet' type='text/css'>
<link
    href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'
    rel='stylesheet' type='text/css'>

<!-- Custom styles for this template -->
<link href="public/css/clean-blog.min.css" rel="stylesheet">

</head>

<body>

    <!-- Page Header -->
    <header class="masthead"
        style="background-image: url('public/img/article-img.jpeg')">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="page-heading">
                        <h1>Espace de lecture</h1>
                        <span class="subheading"></span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <p><?= $post['title'] ?></p>
                <p>
                    <em>le <?= $post['creation_date_fr'] ?></em>
                </p>

                        <p><?= nl2br($post['content']) ?></p>
                        <div class="container">
                    <div class="row">
                        <a href="index.php">Retour à la liste des billets </a> / <a
                            href="index.php?action=editshow&id=<?= $_GET['id'] ?>">modifier
                            mon article </a> / <a
                            href="index.php?action=postSupression&id=<?= $_GET['id'] ?>">supression
                            de l'article</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>
    <h2>Commentaires:</h2>

<?php
while ($comment = $comments->fetch()) {
    ?>
<p>
        <strong><?= ($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br($comment['comment']) ?></p>
<?php
}
?>
<form action="index.php?action=addComment&amp;id=<?= $_GET['id'] ?>"
        method="post">
        <div>
            <label for="author">Auteur</label><br /> <input type="text"
                id="author" name="author" />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
</form>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

</body>

</html>