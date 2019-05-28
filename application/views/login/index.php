<div class="wrapper">
    <form action="admin_login.php" method="post" name="Login_Form" class="form-signin">
        <h3 class="form-signin-heading">Administration du blog</h3>
        <hr class="colorgraph"><br>

        <input type="text" class="form-control mb-2" name="username" placeholder="Nom utilisateur" required="true" autofocus="" />
        <input type="password" class="form-control" name="password" placeholder="Mot de passe" required="true"/>

        <button class="btn btn-lg btn-primary btn-block"  name="Submit" value="Se connecter" type="Submit">
            Se connecter
        </button>
    </form>
</div>