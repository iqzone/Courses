<?php
/* @var $this CoursesController */
/* @var $model Courses */


$this->widget('application.components.CCBreadcrumbs', array(
                                      'links' => array(
                                                	'Courses'=>array('index'),
                                                        $model->name,
                                      ),
)); 

?>

<h2 class="alert alert-info"><?php echo CHtml::encode( $model->name ); ?></h2>

<div class="grid-8">
    <div class="well">
        <h5>Objetivo</h5>
        <p><?php echo $model->target ?></p>
        
        <h5>Descripción</h5>
        <p><?php echo $model->description ?></p>
        <fieldset>
            <legend>Acerca del instructor</legend>
        </fieldset>
    </div>
</div>
