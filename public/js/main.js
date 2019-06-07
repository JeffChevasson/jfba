$(document).ready(function() {
    $('#summernote').summernote({
        height: 250
    });

    $(".btn-delete-post").click(function(e){
        e.preventDefault();
        var href = $(this).attr("href");
        var postid = $(this).data("postid");
        bootbox.confirm({
            message: "Voulez-vous vraiment <strong class='text-danger'>supprimer</strong> l'article <em>" + postid + "</em> ainsi que les commentaires ?",
            size: 'large',
            buttons: {
                confirm: {
                    label: 'Oui',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Non',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if (result){
                    $.get(href, function(data){
                        $(".tr-admin-post-" + postid).hide();
                    });
                    //window.location.href = href;
                }
            }
        });
    });

    $(".btn-signaler-comment").click(function(e){
        e.preventDefault();
        var href = $(this).attr("href");
        var postId = $(this).data("postid");
        var urlret = $(this).data("urlret");
        bootbox.confirm({
            message: "Voulez-vous vraiment <strong class='text-danger'>signaler</strong> ce commentaire ?",
            size: 'large',
            buttons: {
                confirm: {
                    label: 'Oui',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Non',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if (result){
                    $.get(href, function(ret){
                        bootbox.alert(ret, function(){
                            window.location.href = urlret;
                        });
                    })
                }
            }
        });
    });

    $(".btn-autoriser-comment").click(function(e){
        e.preventDefault();
        var href = $(this).attr("href");
        var commentid = $(this).data("commentid");
        bootbox.confirm({
            message: "Voulez-vous vraiment <strong class='text-success'>autoriser la publication</strong> de ce commentaire ?",
            size: 'large',
            buttons: {
                confirm: {
                    label: 'Oui',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Non',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if (result){
                    $.get(href, function(ret){
                        bootbox.alert(ret, function(){
                            $("#div-comment-" + commentid).hide();
                        });
                    })
                }
            }
        });
    });

    $(".btn-supprimer-comment").click(function(e){
        e.preventDefault();
        var href = $(this).attr("href");
        var commentid = $(this).data("commentid");
        bootbox.confirm({
            message: "Voulez-vous vraiment <strong class='text-danger'>supprimer</strong> ce commentaire ?",
            size: 'large',
            buttons: {
                confirm: {
                    label: 'Oui',
                    className: 'btn-success'
                },
                cancel: {
                    label: 'Non',
                    className: 'btn-danger'
                }
            },
            callback: function (result) {
                if (result){
                    $.get(href, function(ret){
                        bootbox.alert(ret, function(){
                            $("#div-comment-" + commentid).hide();
                        });
                    })
                }
            }
        });
    });

    // edition d'un post
    $(".btn-edit-post").click(function(e){
        e.preventDefault();
        var btnName = $("#btn-post").attr("name");
        var action = $("#form_post").attr("action");
        var urlret = $(this).data("urlret");
        if ($("#summernote").summernote("isEmpty")){
            bootbox.alert("Vous devez entrer un texte");
        }else {
            var post_data = {
                "id": $("#postId").val(),
                "title": $("#titre").val(),
                "content": $("#summernote").summernote("code"),
                "btnName": btnName
            };

            $.post(action + "/" + $("#postId").val(), post_data, function (ret) {
                window.location.href = urlret;
            });
        }
    });

    // creation d'un post
    $(".btn-save-post").click(function(e){
        e.preventDefault();
        var btnName = $("#btn-post").attr("name");
        var action = $("#form_post").attr("action");
        var urlret = $(this).data("urlret");
        if ($("#summernote").summernote("isEmpty")){
            bootbox.alert("Vous devez entrer un texte");
        }else {
            var post_data = {
                "title": $("#titre").val(),
                "content": $("#summernote").summernote("code"),
                "btnName": btnName
            };

            $.post(action, post_data, function (ret) {
                window.location.href = urlret;
            });
        }
        //alert(action);
    });

    // ajout commentaire
    $(".btn-add-comment").click(function(e){
        e.preventDefault();
        var action = $("#form_comment").attr("action");
        var urlret = $(this).data("urlret");
        if ($("#summernote").summernote("isEmpty")){
            bootbox.alert("Vous devez entrer un texte");
        }else {
            var post_data = {
                "post_id": $("#postId").val(),
                "author": $("#author").val(),
                "comment": $("#summernote").summernote("code")
            };

            $.post(action + "/" + $("#postId").val(), post_data, function (ret) {
                bootbox.alert(ret, function() {
                    window.location.href = urlret;
                });
            });
        }
    });
});

