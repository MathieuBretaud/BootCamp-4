<?php

// index.php est le fichier point d'entrée unique de notre site
// => quelle que soit la page demandée, on passe toujours et 
// uniquement par index.php
// Avantage, on factorise une partie du code qui est nécessaire à 
// toutes les pages, par exemple l'inclusion de la classe Article 
// ou l'inclusion des templates header et footer

// ===========================================================
// Inclusion des fichiers nécessaires
// ===========================================================

require __DIR__ . '/inc/classes/Article.php';
require __DIR__ . '/inc/classes/Author.php';
require __DIR__ . '/inc/classes/Category.php';

require __DIR__ . '/inc/functions.inc.php';
require __DIR__ . '/inc/data.php';

// ici je viens faire des copies des tableaux assoc contenus dans data.php
// par mesure de sécurité
$categoryList = $dataCategoriesList;
$articlesList = $dataArticlesList;
$authorList = $dataAuthorsList;
// ===========================================================
// Récupération des données nécessaires à toutes les pages
// du site (pour le moment on ne récupère que la page à
// afficher, mais d'autres données viendront se rajouter
// plus tard)
// ===========================================================

// -----------------------------------------------------
// Récupération de la page à afficher
// -----------------------------------------------------

// Par défaut, on considère qu'on affichera la page d'accueil
$pageToDisplay = 'home';
// Mais si un paramètre 'page' est présent dans l'URL, c'est
// qu'on veut afficher une autre page
if (isset($_GET['page']) && $_GET['page'] !== '') {
   $pageToDisplay = $_GET['page'];
}

// ===========================================================
// Chaque page nécessite une préparation différente car elle
// affiche des informations différentes
// ===========================================================

// ------------------
// Page d'Accueil
// ------------------
if ($pageToDisplay === 'home') {
    // Récupération du tableau Php contenant la liste
    // d'objets Article
    $articlesList = $dataArticlesList;
}
// ------------------
// Page Article
// ------------------
else if ($pageToDisplay === 'article') {
    // Récupération du tableau Php contenant la liste
    // d'objets Article

    // On souhaite récupérer uniquement les données de l'article
    // à afficher
    $articleId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    // filter_input renvoie null si la paramètre n'existe pas
    // et false si le filtre de validation échoue
    // On s'assure donc de ne pas tomber ni sur false, ni sur null
    if ($articleId !== false && $articleId !== null) {
        $articleToDisplay = $articlesList[$articleId];
    } 
    // Si l'id n'est pas fourni, on affiche la page d'accueil
    // plutôt que d'avoir un message d'erreur
    else {
        $pageToDisplay = 'home';
    }
}
// ------------------
// Page Auteur
// ------------------
else if ($pageToDisplay === 'author') {
    
}
// ------------------
// Page Catégorie
// ------------------
else if ($pageToDisplay === 'category') {
    $categoryId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    if ($categoryId !== false && $categoryId !== null) {
        // ici j'ai bien reçu un id dans l'url 
        $categoryToDisplay = $categoryList[$categoryId];
        // je fabrique un tableau vide et je rentre dans une boucle 
        // qui va parcourir la liste des articles
        $articlesToDisplay = [];
        // boucle qui va parcourir tous les articles
        foreach($articlesList as $currentId => $currentArticle){
            // si la categorie de l'article que je suis en train de parcourir
            // est égale au nom de la category dont l'id m'a été donnée dans l'url
            if($currentArticle->category == $categoryToDisplay->getName()){
                // ici je viens RAJOUTER $currentArticle en entrée de mon tableau
                $articlesToDisplay[] = $currentArticle;

            }


        }


    } 
    
}

// ===========================================================
// Affichage
// ===========================================================

// Rappel : les variables définies dans index.php, et dans les 
// fichiers inclus par index.php (inc/data.php par exemple)
// seront accessibles dans le code des templates inclus
// ci-dessous

require __DIR__.'/inc/templates/header.tpl.php';
require __DIR__.'/inc/templates/' . $pageToDisplay . '.tpl.php';
require __DIR__.'/inc/templates/footer.tpl.php';