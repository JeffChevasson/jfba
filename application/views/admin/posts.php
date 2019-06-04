<div class="row mb-3 bg-light p-2">
    <div class="col-10">
        <h3 class="text-info">Les articles du blog</h3>
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
            <th>Contenu</th>
            <th>Date de création</th>
            <th>Date de modification</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($posts as $post){ ?>
    <tr>
        <th scope="row"><?= $post->getId(); ?></th>
        <td><?= $post->getTitle(); ?></td>
        <td><?= $post->getSumary(500); ?></td>
        <td><?= $post->getCreationDate()->format("d/m/Y H:i"); ?></td>
        <td></td>
    </tr>
    <tr class="bg-light">
        <td colspan="5" class="float-r">
            <a href="/post/edit/<?= $post->getId(); ?>" class="btn btn-primary" title="Editer article <?= $post->getId(); ?>">
                <i class="fa fa-edit"></i>
            </a>
            <a href="/post/delete/<?= $post->getId(); ?>" class="btn btn-danger btn-delete-post" title="Supprimer article <?= $post->getId(); ?>">
                <i class="fa fa-trash"></i>
            </a>
        </td>
    </tr>
    <?php }; ?>
    </tbody>
</table>
