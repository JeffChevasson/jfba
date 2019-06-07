<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>le blog de l'écrivain</title>
    <!-- Bootstrap core CSS -->
    <link href="<?= BASE_URL ?>public/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />

    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">

    <link rel="stylesheet" href="<?= BASE_URL ?>public/css/main.css" type="text/css" />

    <!-- google web font -->
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

</head>

<body>

<!-- Navigation -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <a class="navbar-brand" href="<?= BASE_URL ?>accueil/index">Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <?php if (isset($_SESSION["username"])){ ?>
                <a class="btn btn-primary offset-10 mr-2" href="<?= BASE_URL ?>admin/posts">
                    <i class="fa fa-gears"></i> Administration
                </a>
                <a class="btn btn-danger" href="<?= BASE_URL ?>logout/index">
                    <i class="fa fa-logout"></i> Déconnexion
                </a>
            <?php }else{ ?>
                <a class="btn btn-primary offset-11 mr-2" href="<?= BASE_URL ?>login/index">
                    <i class="fa fa-fw fa-sign-in"></i> Se connecter
                </a>
            <?php }; ?>
        </div>
    </nav>
</header>

<main role="main" class="container-fluid">
    <div class="row">
        <div class="col-3">
            <div class="card text-white bg-secondary">
                <img class="card-img-top" src="<?= BASE_URL ?>public/img/index-img.jpg" alt="Card image cap">
                <div class="card-body">
                    <h1 class="card-title text-center">Mon Blog</h1>
                    <h2 class="card-text text-center">
                        La visite de l'imaginaire
                    </h2>
                </div>
            </div>
        </div>
        <div class="col">
            <?php echo $content_for_layout; ?>
        </div>
    </div>
</main>

<footer class="footer mt-5">
    <div class="container text-center">
        <span class="text-muted">Copyright &copy; Blog de Jean Forteroche</span>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
        crossorigin="anonymous"></script>
<script src="<?= BASE_URL ?>public/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- include summernote js -->
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>

<!-- bootbox -->
<script src="<?= BASE_URL ?>public/libs/bootbox/bootbox.all.min.js" type="text/javascript"></script>

<script src="<?= BASE_URL ?>public/js/main.js" type="text/javascript"></script>

</body>
</html>