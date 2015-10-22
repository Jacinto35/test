<?php
/**
 * Created by PhpStorm.
 * User: EJ
 * Date: 2015-08-20
 * Time: 14:07
 */

class FormularzController extends CController{

    public function actionDodaj()
    {
        $ModelOsoby = new Osoby;
        $ModelOsoby->imie = 'Mariusz';
        $ModelOsoby->nazwisko = 'Kowalski ';
        $ModelOsoby->save();
        echo '<div>Nowy rekord został dodany.</div>';
    }

    public function actionSzukaj()
    {
        $ModelOsoby = new Osoby;
        $Wynik = $ModelOsoby::model()->countBySql("SELECT count(id) FROM osoby where imie=:imie", array(':imie'=>'Michał'));

     //   echo $Wynik;

        $this->render(
            'pierwszywidok',
            array(
                'title' => 'To jest tytuł strony',
                'content' => 'Lorem ipsum',
                'score' => $Wynik
            )
        );
    }

}