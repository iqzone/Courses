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
<script type="text/javascript">
    var latLngs = '<?php echo $model->latLng ?>';
</script>

<div class="row">
    <div class="grid-8">
        <div class="well">
            <div class="row">
                <div class="grid-7">
                    <div class="grid-7">
                        <fieldset>
                            <legend><b><?php echo CHtml::encode($model->name); ?></b></legend>
                            <div class="grid-7">
                                <h3>Objetivo</h3>
                                <p><?php echo $model->target ?></p>
                            </div>
                        </fieldset>
                    </div>
                    <div class="grid-7">
                            <h3>Descripción</h3>
                            <div class="grid-7 course-description">
                                <?php if($model->placePicture != ''): ?><img class="thumbnail" align="left" src="<?php echo Yii::app()->baseUrl . '/images/courses/maps/' . $model->placePicture ?>" width="100" /><?php endif ?>
                                <p class="description"><?php echo $model->description ?></p>
                            </div>
                            <fieldset>
                                <legend>Acerca del instructor</legend>
                            </fieldset>
                    </div>
                </div>
            </div>
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
        <div class="clear"></div>
        <div class="well">
            <fieldset>
                <legend style="font-size: 14px;">Descargas</legend>
            </fieldset>
        </div>
        <?php if( $model->latLng != '' ): ?>
        <div class="clear"></div>
        <div class="well">
            <fieldset>
                <legend style="font-size: 14px;">Mapa</legend>
                <div id="map_canvas" style="width:200px; height:200px"></div>
            </fieldset>
        </div>
        <?php endif ?>
    </div>
</div>