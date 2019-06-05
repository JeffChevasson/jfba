<?php ob_start(); ?>

<?php foreach ($posts as $post) { ?>

<div class="container_listPost">
<a href="index.php?action=post&id= <?= $post->getId() ?>">

		<h2 class="post-title"><?= htmlspecialchars($post->getTitle()) ?></h2>
		<br>

		<class="post-subtitle"><?php
    // limitation du nombre de caractères dans la page d'acceuil
    if (strlen($post->getContent()) > 50) {
        $content = substr($post->getContent(), 0, 600);
        $dernier_mot = strrpos($content, "");
        echo $content = substr($content, 0, $dernier_mot);
    }
    ?></class>
	</a>
	<p class="post-meta ">
        publié le <?= $post->getCreationDate()->format("d/m/Y"); ?>
	</p>
	<hr>
</div>
<?php
}
//$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

