<?php

namespace App\Controller;

use Exception;

class Controller
{
    public function route(): void
    {
        try {
            if (isset($_GET['controller'])) {
                switch ($_GET['controller']) {
                    case 'page':
                        //charger le controleur page
                        $pageController = new PageController();
                        $pageController->route();
                        break;
                    case 'book':
                        // charger le controleur book
                        $pageController = new BookController();
                        $pageController->route();
                        break;
                    default:
                        throw new \Exception("le controleur n'existe pas");
                        break;
                }
            } else {
                // charger la page d'accueil par defaut.
                $pageController = new PageController();
                $pageController->home();
    
            }

        } catch(\Exception $e){
            $this->render('errors/default',[
                'error'=> $e-> getMessage()
            ]);
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
