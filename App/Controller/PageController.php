<?php

namespace App\Controller;

class PageController extends Controller
{
    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'about':
                        //appeler la méthode about()
                        $this->about();
                        break;
                    case 'home':
                        // appeler la méthode home()
                        $this->home();
                    case 'contact':
                        // appeler la méthode home()
                        $this->contact();
                        break;
                    default:
                        //erreur
                        throw new \Exception("Cette action n'existe pas : " . $_GET['action']);
                        break;
                }
            } else {
                // charger la page d'accueil
                throw new \Exception("Aucune action détectée");
            }
        } catch (\Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }
    //Affichage de la page About
    protected function about()
    {
        $params = [
            'test' => 'abc',
            'test2' => 'def',
        ];

        $this->render('page/about', $params);
    }

    //Affichage de la page Home
    protected function home()
    {
        $params = [];

        $this->render('page/home', $params);
    }
    //Affichage de la page contact
    protected function contact()
    {
        $params = [];

        $this->render('page/contact', $params);
    }
}
