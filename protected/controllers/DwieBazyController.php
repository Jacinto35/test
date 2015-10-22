<?php

/**
 * Created by PhpStorm.
 * User: EJ
 * Date: 2015-08-20
 * Time: 13:23
 */
class DwieBazyController extends CController
{
    public function actionIndex()
    {
        $Polaczenie = Yii::app()->db;
        $Zapytanie = $Polaczenie->createCommand('SELECT * FROM osoby LIMIT 0 ,2');
        $DaneZBazy = $Zapytanie->query();
        while (($Rekord = $DaneZBazy->read()) !== false) {
            echo $Rekord['imie'];
        }
        echo "<br/><br/>";

        $Polaczenie2 = Yii::app()->db2;
        $Zapytanie2 = $Polaczenie2->createCommand('SELECT * FROM zawody LIMIT 0 ,2');
        $DaneZBazy2 = $Zapytanie2->query();
        while (($Rekord = $DaneZBazy2->read()) !== false) {
            echo $Rekord['nazwa'] . '<br />';
        }
    }
}