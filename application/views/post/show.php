<h3>
    <?= htmlspecialchars($post->getTitle()) ?>
    <br />
    <span class="text-danger text-muted">a été publié le <?= $post->getCreationDate()->format("d/m/Y H:i:s"); ?></span>
</h3>
<div class="border-left border-primary">
    <?= nl2br($post->getContent()); ?>
</div>

<div class="row bg-light p-2 mb-5">
    <a href="/accueil/index">
        <button type="button" class="btn btn-info">
            Retour à la liste des billets
        </button>
    </a>
</div>

<?php if (count($comments) > 0){ ?>
    <h4>
        <em>Les commentaires des utilisateurs: </em>
    </h4>
<?php foreach ($comments as $comment){ ?>
    <?php $head = "<strong>".($comment->getAuthor())."</strong> le ".$comment->getCommentDate()->format("d/m/Y H:i:s"); ?>
    <div class="card mb-5">
        <div class="card-body">
            <h5 class="card-title"><?= $head ?></h5>
            <?= nl2br($comment->getComment()) ?>
            <a href="/post/show/<?= $post->getId(); ?>" class="btn btn-danger">Signaler</a>
        </div>
    </div>

    <?php /*<div class="row">

    </div>
        <strong><?= ($comment->getAuthor()) ?></strong> le <?= $comment->getCommentDate()->format("d/m/Y H:i:s") ?>
	<p><?= nl2br($comment->getComment()) ?><br /> <a
			href="index.php?action=reportcomment&id=<?=$_GET['id']?>&repport=<?=$comment->getId()?>"><button
				type="button" class="btn btn-danger">report</button></a>
	</p>*/ ?>

<?php } ?>
    <?php }else{ ?>
<div class="alert alert-danger" role="alert">
    Aucun utilisateur n'a encore réagi, soyez le premier !
</div>
    <?php }; ?>

<h4>
    <em>Ajouter votre commentaire</em>
</h4>

<?php include_once "form_comment.php"; ?>
