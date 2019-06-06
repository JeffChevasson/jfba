<div class="row mb-3 bg-light p-2">
    <div class="col-10">
        <h3 class="text-primary">Les articles du blog</h3>
    </div>
    <div class="col">
        <a href="/post/create" class="btn btn-success">
            <i class="fa fa-plus"></i> Nouvel article
        </a>
    </div>
</div>

<table class="table">
    <thead class="thead-default">
        <tr>
            <th>Id</th>
            <th>Titre</th>
            <th class="w-50">Contenu</th>
            <th>Date de création</th>
            <th>Date de modification</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($posts as $post){ ?>
    <tr class="tr-admin-post-<?= $post->getId(); ?>">
        <th scope="row"><?= $post->getId(); ?></th>
        <td><?= $post->getTitle(); ?></td>
        <td><?= $post->getSumary(250); ?></td>
        <td><?= $post->getCreationDate()->format("d/m/Y H:i"); ?></td>
        <td>
            <?php
                if ($post->getModificationDate()){
                    echo $post->getModificationDate()->format("d/m/Y H:i");
                }else{
                    echo "--";
                }
                ?>
        </td>
    </tr>
    <tr class="bg-light tr-admin-post-<?= $post->getId(); ?>">
        <?php
            $nbCommsSignales = count($stats_posts[$post->getId()]);
        ?>
        <td colspan="5" class="float-r">
            <?php if ($nbCommsSignales > 0){ ?>
            <a href="/post/showsignales/<?= $post->getId(); ?>" class="btn btn-warning">
                Commentaires signalés (<?= $nbCommsSignales ?>)
            </a>
            <?php }; ?>
            <a href="/post/edit/<?= $post->getId(); ?>" class="btn btn-primary" title="Editer article <?= $post->getId(); ?>">
                <i class="fa fa-edit"></i> Modifier
            </a>
            <a href="/post/delete/<?= $post->getId(); ?>" data-postid="<?= $post->getId(); ?>" class="btn btn-danger btn-delete-post" title="Supprimer article <?= $post->getId(); ?>">
                <i class="fa fa-trash"></i> Supprimer
            </a>
        </td>
    </tr>
    <?php }; ?>
    </tbody>
</table>
