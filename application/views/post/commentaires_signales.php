
<div class="row mb-3 bg-light p-2">
    <h3 class="col-10">
        Modération de l'article <em><?= $post->getTitle(); ?></em>
    </h3>
    <a href="/admin/posts" class="btn btn-danger">Retour a la liste des articles</a>
</div>
<p>
    Ci-dessous les commentaires <strong class="text-warning">signalés</strong> par des utilisateurs
</p>
<?php foreach ($comments as $comment){ ?>
    <?php $head = "<strong>".($comment->getAuthor())."</strong> le ".$comment->getCommentDate()->format("d/m/Y H:i:s"); ?>
    <div class="card mb-5" id="div-comment-<?= $comment->getId(); ?>">
        <div class="card-header"><?= $head ?></div>
        <div class="card-body">
            <em><?= nl2br($comment->getComment()) ?></em>
        </div>
        <div class="card-footer text-muted text-right">
            <a data-commentid="<?= $comment->getId(); ?>" href="/comment/autoriser/<?= $comment->getId(); ?>" class="btn btn-success btn-autoriser-comment">
                Approuver et Publier
            </a>
        </div>
    </div>
<?php } ?>