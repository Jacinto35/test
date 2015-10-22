<div class="form" style="padding: 15px;">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    <p class="note">Pola oznaczone <span class="required">*</span> są wymagane.</p>
    <?php
    if ($saved == true) {
        echo '<div style="color: #600000;">Dane zostały zapisane.</div>';
    }
    ?>
    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'name '); ?>
        <?php echo $form->textField($model, 'name'); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model, 'lastname'); ?>
        <?php echo $form->textField($model, 'lastname'); ?>
        <?php echo $form->error($model, 'lastname'); ?>
    </div>
    <div class="row buttons">
        <?php echo CHtml::submitButton('Dodaj'); ?>
    </div>
    <?php $this->endWidget(); ?>

    <div class="row">
        <?php echo CHtml::link('Strona testowa ', array('user/test', 'name' => 'Jacek'), array('confirm' => "Tak, czy kurwa nie")); ?>
    </div>
    <div class="row">
        <?php
        echo '<pre>';

        echo Yii::app()->params['adminEmail'];
        echo Yii::app()->params['copyrightFoot'];
        ?>
    </div>
</div>