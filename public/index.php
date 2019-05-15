<?php
require ("/controler/frontend.php");
$action = "";
if (! empty($_GET['action'])) {
    $action = $_GET['action'];
}
switch ($action) {
    
    // Liste tous les billets
    case 'listPosts':
        listPosts();
        break;
    
    // Fonction de rajout d'un commentaire à un billet
    case 'addComment':
        addComment($_GET['id'], $_POST['author'], $_POST['comment']);
        break;
    
    // Affichage des billets et de leurs commentaires dans le frontend
    case 'post':
        post();
        break;
    
    // affichage des billets et des commentaires dans le backend
    case 'postAdmin':
        postAdmin();
        break;

    // Ajout d'un article en BDD
    case 'add_new_content':
        add_new_content($_POST['title'], $_POST['content']);
        break;


    // Gestion de l'edition des billets via un TTX
    case 'postEdition':
        postEdition($_GET['id'], $_POST['title'], $_POST['content']);
        break;
        
    // Suppression d'un billet    
    case 'postSupression':
        postSupression($_GET['id']);
        break;
        
    // Edition d'un commentaire via un TTX    
     case 'editShowComment':
        editShowComment($_GET['id']);
        break;
        
    // Montre la page de connexion
    case 'displaylogin':
        displaylogin();
        break;

    // Vérification de la présence d'un user dans la BDD    
    case 'connectionMember':
        connectionMember($_POST['username'], $_POST['pass']);
        break;

    // Affichage des billets dans la page Admin
    case 'gestionPosts':
        gestionPosts();
        break;

    // Liste tous les billets par défaut
    default:
        listPosts();
        break;

}