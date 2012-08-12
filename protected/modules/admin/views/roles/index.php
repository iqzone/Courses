<?php
/* @var $this RolesController */

$this->breadcrumbs=array(
	'Roles',
);
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'members-form',
	'enableAjaxValidation'=>false,
)); ?>
    
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name', Members::getUserRoleOptions(), array('size'=>5,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'operations'); ?>
		<?php echo $form->dropDownList($model,'operations', Members::getUserRoleOptions(), array('multiple'  => true, 'size'=>5,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'operations'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->