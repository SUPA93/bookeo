<?php

namespace App\Controller;


class BookController extends Controller
{
    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'show':
                        //appeler la méthode show()
                        $this->show();
                        break;
                    case 'list':
                        // appeler la méthode list()
                        $this->home();
                    case 'edit':
                        // appeler la méthode edit()
                        $this->edit();
                        break;
                    case 'add':
                        // appeler la méthode add()
                        $this->add();
                    case 'delete':
                        // appeler la méthode delete()
                        $this->delete();
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
    //Affichage de la page show
    protected function show()
    {
        $params = [];

        $this->render('book/show', $params);
    }
}
