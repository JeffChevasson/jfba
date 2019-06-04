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
});

