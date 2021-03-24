<?php
define("URL",str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https": "http")."://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

require_once('controllers/Ecoles.controller.php');
require_once('controllers/Eleves.controller.php');
require_once('controllers/Sports.controller.php');
$ecoleController = new EcolesController;
$eleveController = new ElevesController;
$sportController = new SportsController;
try{
if(empty($_GET['page'])){
  require_once('views/accueil.view.php');
}
else{
  $url = explode("/",filter_var($_GET['page']), FILTER_SANITIZE_URL);
  // echo '<pre>';
  // print_r($url);
  switch ($url[0]) {
    case 'accueil':
      require "views/accueil.view.php";
      break;
      case 'ecoles':

        if(empty($url[1])){
          $ecoleController->afficherEcoles();
        }else if($url[1] === "h"){
        $ecoleController->afficherEcole();
        }else if($url[1] === "a"){
          echo "ajout d'une ecole";
        }
        else if($url[1] === "m"){
          echo "modifier une ecole";
        }
        else if($url[1] === "s"){
          echo "supprimer une ecole";
        }else{
          throw new  Exception("La page n'existe pas");

        }
        break;
        case 'eleves':
          if(empty($url[1])){
            $eleveController->afficherEleves();
          }else if ($url[1] === "e"){
            echo "afficher un eleve";
          }else if ($url[1] === "a"){
            echo "ajouter un eleve";
          }else if ($url[1] === "m"){
            echo "modifier un eleve";
          }else if($url[1] === "s"){
            echo "supprimer un eleve";
          }else{
            throw new  Exception("La page n'existe pas");

          }

          break;
          case 'sports':
            if(empty($url[1])){
              $sportController->afficherSports();
             }else if ($url[1] === "k"){
               echo "afficher un sport";
            }else if ($url[1] === "a"){
              echo "ajouter un sport";
            }else if ($url[1] === "m"){
              echo "modifier un sport";
            }else if($url[1] === "s"){
              echo "supprimer un sport";
             }

            break;
    default:
    throw new  Exception("La page n'existe pas");
      break;
  }
}
}
catch(Exception $e){
  echo $e->getMessage();
}


