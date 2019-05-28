<div class="row mb-3">
    <div class="col-10">
        <h3 class="text-primary">La liste des articles du blog</h3>
    </div>
    <div class="col">
        <a href="/post/"
    </div>
</div>

<table class="table">
    <thead class="thead-default">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Titre</th>
            <th scope="col">Contenu</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($posts as $post){ ?>
    <tr>
        <th scope="row"><?= $post->getId(); ?></th>
        <td><?= $post->getTitle(); ?></td>
        <td><?= $post->getContent(); ?></td>
    </tr>
    <tr>
        <td colspan="3" class="offset-10">
            <a href="/post/edit/<?= $post->getId(); ?>" class="btn btn-primary" title="Editer article <?= $post->getId(); ?>">
                <i class="fa fa-edit"></i>
            </a>
            <a href="/post/delete/<?= $post->getId(); ?>" class="btn btn-danger" title="Supprimer article <?= $post->getId(); ?>">
                <i class="fa fa-trash"></i>
            </a>
        </td>
    </tr>
    <?php }; ?>
    </tbody>
</table>
