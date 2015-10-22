<?php

/**
 * Created by PhpStorm.
 * User: EJ
 * Date: 2015-08-24
 * Time: 21:07
 */
class UserController extends CController
{
    public function actionIndex()
    {
        $saved = false;
        $userModel = new User;
        if (isset($_POST['User'])) {
            $userModel->attributes = $_POST['User'];
            if ($userModel->validate()) {
                $userModel->save();
                $saved = true;
            }
        }

        $this->render(
            'form',
            array(
                'model' => $userModel,
                'saved' => $saved
            )
        );
    }

    public function actionTest($name)
    {


        $userModel = new User;
        $this->render(
            'test',
            array(
                'model' => $userModel,
                'name' => $name,
            )
        );
    }
}