$(document).ready(function() {
    $('#summernote').summernote({
        height: 250
    });

    $(".btn-delete-post").click(function(e){
        e.preventDefault();
        var href = $(this).attr("href");
        bootbox.confirm({
            message: "Voulez-vous vraiment <strong class='text-danger'>supprimer</strong> l'article ainsi que les commentaires ?",
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
                    window.location.href = href;
                }
            }
        });
    });

    $(".btn-signaler-comment").click(function(e){
        e.preventDefault();
        var href = $(this).attr("href");
        var postId = $(this).data("postid");
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
                            window.location.href = "/post/show/" + postId;
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
        var post_data = {
            "postId" : $("#postId").val(),
            "title" : $("#titre").val(),
            "content" : $("#summernote").summernote("code"),
            "btnName" : btnName
        };

        $.post("/post/xhredit/" + $("#postId").val(), post_data, function(ret){
            alert(ret);
        }, "json");
    });
});

