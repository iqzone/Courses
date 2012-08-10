<?php
/* @var $this CoursesController */
/* @var $dataProvider CActiveDataProvider */

$this->widget('application.components.CCBreadcrumbs', array(
                                      'links' => array(
                                                'Cursos' => array( 'url' => array( 'courses' ), 'isActive' => 'active') ,
                                      ),
)); 

$this->menu=array(
	array('label'=>'Create Courses', 'url'=>array('create')),
	array('label'=>'Manage Courses', 'url'=>array('admin')),
);
?>

<h1>Courses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
