<?php

/**
 * Created by PhpStorm.
 * User: EJ
 * Date: 2015-08-19
 * Time: 21:34
 */
class FormularzdaneController extends CController
{
    public function actionIndex()
    {
        if (isset($_POST['wyslano']) && $_POST['wyslano'] == 'tak') {
            $db_conn = Yii::app()->db;
            $query = $db_conn->createCommand('INSERT INTO osoby (imie,nazwisko) VALUES ( :imie, :nazwisko)');

            $query->bindParam(":imie", $_POST['imie'], PDO::PARAM_STR);
            $query->bindParam(":nazwisko", $_POST['nazwisko'], PDO::PARAM_STR);
            $query->execute();
            echo '<div>Dane zostały umieszczone w tabeli ,</div>';
        }
        echo '<form action="formularzdane" method="post">
        Imię: <input type="text" name="imie" /><br />
Nazwisko: <input type="text" name="nazwisko" /><br />
<input type="hidden" name="wyslano" value="tak" />
<input type="submit" value="Dodaj" />
</form>';
    }
}