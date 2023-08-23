<?php

namespace App\Controller;

use Exception;

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
    protected function render(string $path, array $params = []): void
    {
        $filePath = _ROOTPATH_ . '/templates/' . $path . '.php';

        try {
            if (!file_exists($filePath)) {
                throw new \Exception("Fichier non trouvé : ".$filePath);
            } else {
                extract($params);
                require_once $filePath;
            }
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }
}
