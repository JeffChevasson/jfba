<h3>
    <?= htmlspecialchars($post->getTitle()) ?>
    <br />
    <span class="text-danger text-muted">a été publié le <?= $post->getCreationDate()->format("d/m/Y H:i:s"); ?></span>
</h3>
<div class="border-left border-primary">
    <?= nl2br($post->getContent()); ?>
</div>

<div class="row bg-light p-2 mb-5">
    <a href="<?= BASE_URL ?>accueil/index">
        <button type="button" class="btn btn-info">
            Retour à la liste des billets
        </button>
    </a>
</div>

<?php if (count($comments) > 0){ ?>
<div class="row mb-3 bg-light p-2">
    <h4 class="text-primary">Les commentaires des utilisateurs</h4>
</div>
<?php foreach ($comments as $comment){ ?>
    <?php $head = "<strong>".($comment->getAuthor())."</strong> le ".$comment->getCommentDate()->format("d/m/Y H:i:s"); ?>
    <div class="card mb-5">
        <div class="card-header"><?= $head ?></div>
        <div class="card-body">
            <em><?= nl2br($comment->getComment()) ?></em>
        </div>
         <div class="card-footer text-muted text-right">
            <a data-postid="<?= $post->getId(); ?>" href="<?= BASE_URL; ?>comment/signaler/<?= $comment->getId(); ?>"
               data-urlret="<?= BASE_URL; ?>post/show/<?= $post->getId(); ?>" class="btn btn-danger btn-signaler-comment">Signaler</a>
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

<div class="row mb-3 bg-light p-2">
    <h4 class="text-primary">Ajouter votre commentaire</h4>
</div>

<?php include_once "form_comment.php"; ?>
