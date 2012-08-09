<?php
/* @var $this CoursesController */
/* @var $model Courses */
?>

<div id='categories'>
    <div class="item">
        <div class='graybar'><i class='left'></i><h2><?php echo CHTml::encode( $data->name ) ?></h2><i class='right'></i></div>
        <div class='clear'></div>
        <?php foreach( $data->courses as $course ): ?>
        <div class='row course-container'>
            <div class='grid-12'>
                <div class='grid-3 course-item'>
                    <h3><i class="icon hacking"></i><a href="#"><?php echo CHtml::encode( $course->name ) ?></a></h3>
                    <p><?php echo CHtml::encode( $course->target ) ?></p>
                </div>
                <div class="grid-8 course-description">
                    <h4>Descripción:</h4>
                    <p><?php echo CHtml::encode( $course->description ) ?></p>
                    <div class="buttons-buy">
                        <div class='grid-1'><?php echo CHtml::link( '&nbsp;&nbsp;Ver más', array( '/' ), array( 'class' => 'icon-plus' ) ) ?></div>
                        <div class='grid-1'><?php echo CHtml::link( '&nbsp;&nbsp;Comprar', array( '/' ), array( 'class' => 'icon-credit-card' ) ) ?></div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>