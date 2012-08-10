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


<div class="row">
    <div class="grid-8">
        <div class="well">
            <fieldset>
                <legend><b><?php echo CHtml::encode( $model->name ); ?></b></legend>
                <h5>Objetivo</h5>
                <p><?php echo $model->target ?></p>

                <h5>Descripción</h5>
                <p><?php echo $model->description ?></p>
                <fieldset>
                    <legend>Acerca del instructor</legend>
                </fieldset>
            </fieldset>
        </div>
    </div>
    <div class="grid-3 right-sidebar">
        <div class="well">
            <fieldset>
                <legend style="font-size: 14px;">Formas de pago</legend>
                <?php foreach( $model->getPayforms( 'infoByCriteria' ) as $payform ): ?>
                    <a href="" class="btn btn-warning payforms"><i class="icon-shopping-cart icon-large"></i>&nbsp;&nbsp;<?php echo $payform->name ?></a>
                <?php endforeach; ?>
            </fieldset>
        </div>
        <div class="clear"><br /></div>
        <div class="well">
            <fieldset>
                <legend style="font-size: 14px;">Descargas</legend>
            </fieldset>
        </div>
    </div>
</div>