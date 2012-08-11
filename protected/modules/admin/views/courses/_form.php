<?php
/* @var $this CoursesController */
/* @var $model Courses */
/* @var $form CActiveForm */
?>

<div class="row">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'courses-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'       => array( 'class' => 'well' ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="controls">
		<?php echo $form->labelEx($model,'category_id'); ?>
		<?php echo $form->dropDownList($model,'category_id', CHtml::listData($model->getCategories(), 'id', 'name'), array('size'=>1,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'category_id'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>140)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'target'); ?>
		<?php echo $form->textField($model,'target',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'target'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>3, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
        
        <div class="">
		<?php echo $form->labelEx($model,'courseMemberRoles'); ?>
                <?php echo $form->dropDownList($model->courseMemberRoles,'member_id', CHtml::listData( Members::getAll(), 'id', 'name' ), array('size' => 5, 'multiple' => true)); ?>
        </div>

	<div class="">
		<?php echo $form->labelEx($model,'payforms'); ?>
		<?php echo CHtml::activeCheckBoxList($model,'payforms', CHtml::listData($model->getPayForms(), 'id', 'name'), array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'payforms'); ?>
	</div>
        
	<div class="">
		<?php echo $form->labelEx($model,'given_date'); ?>
		<?php echo $form->textField($model, 'given_date', array('size'=>50,'maxlength'=>50, 'class' => 'datepicker')); ?>
		<?php echo $form->error($model,'given_date'); ?>
	</div>

	<div class="">
		<?php echo $form->labelEx($model,'enabled'); ?>
		<?php echo $form->checkbox($model,'enabled'); ?>
		<?php echo $form->error($model,'enabled'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->