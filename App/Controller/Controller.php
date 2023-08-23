<?php

namespace App\Controller;

class Controller
{
    public function route(): void
    {
        if (isset($_GET['controller'])) {
            switch ($_GET['controller']) {
                case 'page':
                    //charger le controleur page
                    $pageController = new PageController();
                    $pageController->route();
                    break;
                case 'book':
                    // charger le controleur book
                    var_dump('On charge BookController');
                    break;
                default:
                    //erreur
                    break;
            }
        } else {
            // charger la page d'accueil
        }
    }
    //méthode de rendu
    protected function render(string $path, array $params = []):void
    {
        require _ROOTPATH_.'/templates/page/about.php';
    }
}
