<?php foreach ($posts as $post) { ?>
    <div class="card mb-5">
        <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($post->getTitle()) ?></h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?= $post->getSubTitle(); ?>
            </h6>
            <?= nl2br($post->getSumary()); ?>
            <a href="/post/show/<?= $post->getId(); ?>" class="btn btn-primary">Lire l'article</a>
        </div>
        <div class="card-footer text-muted text-right">
            Publié le <?= $post->getCreationDate()->format("d/m/Y H:i"); ?>
        </div>
    </div>
<?php } ?>