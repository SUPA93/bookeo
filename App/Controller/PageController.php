<?php 

namespace App\Controller;

class PageController extends Controller
{
    public function route(): void
    {
        if (isset($_GET['action'])) {
            switch ($_GET['action']) {
                case 'about':
                    //appeler la méthode about()
                    $this->about();
                    break;
                case 'home':
                    // appeler la méthode home()
                    var_dump('On appelle la méthode home');
                    break;
                default:
                    //erreur
                    break;
            }
        } else {
            // charger la page d'accueil
        }
    }

    protected function about()
    {
        /*on pourrait récupérer les données
        en faisant appel au modèle
        */


        $this->render('page/about');
    }
    

}



?>