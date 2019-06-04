<?php
    if (isset($post)){
        $action = "/post/xhrEdit/".$post->getId();
        $nameBtn = "doEdit";
    }else{
        $action = "/post/create";
        $nameBtn = "doCreate";
        $post = new \application\models\Post();
    }
?>

<form action="<?= $action; ?>" method="post" id="form_post">
    <input type="hidden" id="postId" value="<?= $post->getId(); ?>" />
    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" class="form-control" id="titre" aria-describedby="titreHelp"
               name="title" placeholder="Entrez le titre de l'article" required="true" value="<?= $post->getTitle(); ?>" />
    </div>
    <div class="form-group">
        <label for="commentaire">Contenu</label>
        <textarea id="summernote" style="height: 150px;" class="form-control" name="content" required="true"><?= $post->getContent(); ?></textarea>
    </div>
    <div class="row bg-light p-2">
        <a href="/admin/posts" class="btn btn-danger mr-2">Retour à la liste des articles</a>
        <button id="btn-post" type="submit" name="<?= $nameBtn; ?>" class="btn btn-edit-post btn-success">Valider</button>
    </div>
</form>