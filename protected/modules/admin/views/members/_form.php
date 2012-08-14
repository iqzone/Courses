<?php
/* @var $this MembersController */
/* @var $model Members */
/* @var $form CActiveForm */
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
		<?php echo $form->textField($model,'name',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->textField($model,'password',array('size'=>60,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
        
        <?php if( Yii::app()->authManager->checkAccess( 'instructors', Yii::app()->user->id ) ): ?>
	<div class="row">
		<?php echo $form->labelEx($model->memberProfile,'picture'); ?>
		<?php echo $form->fileField($model->memberProfile,'picture'); ?>
		<?php echo $form->error($model->memberProfile,'picture'); ?>
	</div>
        
        <div class="controls">
            <?php echo $form->labelEx($model->memberProfile,'twitter'); ?>
            <div class="input-prepend">
              <span class="add-on"><i class="icon-twitter"></i></span><?php echo $form->textField($model->memberProfile,'twitter', array('class' => 'span2')); ?>
            </div>
            <?php echo $form->error($model->memberProfile,'twitter'); ?>
        </div>
        
        <div class="controls">
            <?php echo $form->labelEx($model->memberProfile,'linkedin'); ?>
            <div class="input-prepend">
              <span class="add-on"><i class="icon-linkedin"></i></span><?php echo $form->textField($model->memberProfile,'linkedin', array('class' => 'span2')); ?>
            </div>
            <?php echo $form->error($model->memberProfile,'linkedin'); ?>
        </div>
        
        <div class="controls">
            <?php echo $form->labelEx($model->memberProfile,'gtalk'); ?>
            <div class="input-prepend">
              <span class="add-on"><i class="icon-google-plus"></i></span><?php echo $form->textField($model->memberProfile,'gtalk', array('class' => 'span2')); ?>
            </div>
            <?php echo $form->error($model->memberProfile,'gtalk'); ?>
        </div>
        
        <div class="controls">
            <?php echo $form->labelEx($model->memberProfile,'msn'); ?>
            <div class="input-prepend">
              <span class="add-on"><i class="icon-group"></i></span><?php echo $form->textField($model->memberProfile,'msn', array('class' => 'span2')); ?>
            </div>
            <?php echo $form->error($model->memberProfile,'email'); ?>
        </div>
        
        <div class="controls">
            <?php echo $form->labelEx($model->memberProfile,'website'); ?>
            <div class="input-prepend">
              <span class="add-on"><i class="icon-link"></i></span><?php echo $form->textField($model->memberProfile,'website', array('class' => 'span2')); ?>
            </div>
            <?php echo $form->error($model->memberProfile,'website'); ?>
        </div>
        <?php endif ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->