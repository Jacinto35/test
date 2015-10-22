<?php

/**
 * Created by PhpStorm.
 * User: EJ
 * Date: 2015-08-25
 * Time: 17:26
 */
class FormularzTypyController extends CController
{
    public function actionTekst()
    {
       Yii::app()->user->setFlash('test','Pierwszy komunikat');


       $this->redirect('index');
        $userModel= new User('register');

        if (isset($_POST['User'])) {
            $_POST['User']['lastname'] = 'aaa';
            $userModel->attributes = $_POST['User'];
            if ($userModel->validate()) {
                $userModel->save();
            }

        }

        $this->render(
            'formularz1',
            array(
                'model' => $userModel
            )
        );
    }

    public function actionIndex(){
        $this->render('index');
    }
}