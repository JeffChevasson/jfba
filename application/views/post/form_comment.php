<form action="<?= BASE_URL ?>comment/xhrcreate" method="post" id="form_comment">
    <input type="hidden" id="postId" name="post_id" value="<?= $post->getId(); ?>" />
    <div class="form-group">
        <label for="auteur">Auteur</label>
        <input type="text" class="form-control" id="author" aria-describedby="authorHelp"
               name="author" placeholder="Entrez votre nom et prénom" required="true" />
    </div>
    <div class="form-group">
        <label for="commentaire">Commentaire</label>
        <textarea id="summernote" class="form-control" name="comment" required="true"></textarea>
    </div>
    <div class="row bg-light p-2">
        <button data urlret="<?= BASE_URL ?>post/show/<?= $post->getId(); ?>"" id="btn-comment" type="submit" class="btn btn-add-comment btn-success">Valider</button>
    </div>
</form>