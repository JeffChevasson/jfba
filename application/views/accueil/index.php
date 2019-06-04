<?php foreach ($posts as $post) { ?>
    <div class="card mb-5 border-secondary">
        <div class="card-header">
            <?= htmlspecialchars($post->getTitle()) ?>
        </div>
        <div class="card-body">
            <?= nl2br($post->getSumary(500)); ?>
        </div>
        <div class="card-footer text-muted text-right">
            <div class="row">
                <div class="col-1 ml-0">
                    <a href="/post/show/<?= $post->getId(); ?>" class="btn btn-primary">Lire l'article</a>
                </div>
                <div class="col-11 float-right">Publié le <?= $post->getCreationDate()->format("d/m/Y H:i"); ?></div>
            </div>
        </div>
    </div>
<?php } ?>