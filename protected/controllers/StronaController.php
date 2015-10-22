<?php

class StronaController extends CController
{

	public function actionIndex()
	{
		echo 'jestem';
	}

    public function actionHello()
    {
        echo 'Witaj świecie';
    }


    public function actionCount($nubmer_first, $number_second)
    {
        echo $nubmer_first + $number_second;
    }
}