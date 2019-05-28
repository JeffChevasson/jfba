<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>le blog de l'écrivain</title>
    <!-- Bootstrap core CSS -->
    <link href="/public/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
          integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous" />

    <link rel="stylesheet" href="/public/css/main.css" type="text/css" />

    <!-- google web font -->
    <link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css' />
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css' />

</head>

<body>

<!-- Navigation -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
        <a class="navbar-brand" href="#">Accueil</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
            <ul class="my-2 my-lg-0">
                <li class="nav-item">
                    <?php if (isset($_SESSION["username"])){ ?>
                        <a class="nav-link" href="/admin">
                            <i class="fa fa-fw fa-gears"></i> Administration
                        </a>
                    <?php }else{ ?>
                        <a class="nav-link" href="/login">
                            <i class="fa fa-fw fa-sign-in"></i> Se connecter
                        </a>
                    <?php }; ?>
                </li>
            </ul>
        </div>
    </nav>
</header>

<main role="main" class="container-fluid">
    <div class="row">
        <div class="col-3">
            <div class="jumbotron text-center">
                <h1>Mon Blog</h1>
                <p>La visite de l'imaginaire</p>
            </div>
        </div>
        <div class="col">
            <?php echo $content_for_layout; ?>
        </div>
    </div>
</main>

<footer class="footer mt-5">
    <div class="container text-center">
        <span class="text-muted">Copyright &copy&copy; Blog de Jean Forteroche</span>
    </div>
</footer>

<script src="/public/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="/public/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>

<script src="/public/js/main.js" type="text/javascript"></script>

</body>
</html>