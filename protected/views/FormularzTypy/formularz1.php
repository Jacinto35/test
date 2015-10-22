<div class="form" style="padding: 15px;">
    <?php $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => false,
    )); ?>
    <div class="row">
        <?php echo $form->labelEx($model, 'name '); ?>
        <?php echo $form->textField($model, 'name'); ?>
        <?php echo $form->error($model, 'name'); ?>
    </div>

    <div class="row buttons"><?php echo CHtml::resetButton('Wyczyść'); ?>
        <?php echo CHtml::submitButton('Dodaj'); ?>
    </div>
    <?php $this->endWidget(); ?>
</div>