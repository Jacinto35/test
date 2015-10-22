
    <?php
    if(Yii::app()->user->hasFlash('test')) {
        echo Yii::app()->user->getFlash('test');
    }
    ?>
