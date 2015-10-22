<?php

/**
 * Created by PhpStorm.
 * User: EJ
 * Date: 2015-08-19
 * Time: 20:57
 */
class BazadanychController extends CController
{
    public function actionIndex()
    {
        $db_conn = Yii::app()->db;
        $query = $db_conn->createCommand("SELECT * FROM osoby");
        $result = $query->query();

        while (($osoba = $result->read()) !== false) {
            echo $osoba['imie'] . '<br/>';
        }
    }

    public function actionDodaj()
    {
        $db_conn = Yii::app()->db;
        $query = $db_conn->createCommand("INSERT INTO osoby (imie,nazwisko) VALUES ('Ola','Wojtek')");
        $query->execute();
    }

    public function actionQuery1()
    {
        $db_conn = Yii::app()->db;
        $query = $db_conn->createCommand("SELECT * FROM osoby");
        $osoby = $query->queryScalar();
        echo '<pre>';
        print_r($osoby);
        echo '</pre>';

    }


}