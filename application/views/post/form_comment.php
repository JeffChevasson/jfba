<form action="/comment/create" method="post">
    <input type="hidden" name="post_id" value="<?= $post->getId(); ?>" />
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
        <button type="submit" class="btn btn-success">Valider</button>
    </div>
</form>