<?php
/*----------interface----------*/
interface IVehicule
{
    public function accelerer();
    public function freiner();
}
/*---------TRAIT------*/
trait Moteur
{
    function demarrer()
    {
        echo 'demarrage moteur';
    }
    function arreter()
    {
        echo 'arrêt du moteur';
    }
}
/*-------CLASS VEHICULE--------*/
class Vehicule implements IVehicule
{
    use moteur;

    protected string $marque;
    protected float $vitesse_max;

    public function __construct(string $marque, float $vitesse_max)
    {
        $this->marque = $marque;
        $this->vitesse_max = $vitesse_max;
    }
    /**set the value of vitesse_max */
    public function setVitesseMax(float $vitesse_max): self
    {

        return $this->$vitesse_max;
    }

    /* Get the value of vitesse_max
     */
    public function getVitesseMax(): float
    {
        return $this->vitesse_max;
    }

    function accelerer()
    {
        echo 'la voiture accelere';
    }
    function freiner()
    {
        echo 'la voiture freine';
    }
}



/*HERITAGE*/
class Voiture extends Vehicule
{
    /* use moteur*/
    protected int $nombre_roues;
}


class Bateau
{
    protected string $nombre_cabines;
}

$voiture1 = new Voiture('Toyota', 280);

echo $voiture1->getVitesseMax();

$voiture2 = new Voiture('Renault', 260);
echo $voiture2->getVitesseMax();
