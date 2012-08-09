<?php
/* @var $this CoursesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Courses',
);
?>
<h1>Cursos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
        'template'=> "{sorter}\n{items}\n{pager}",
)); ?>
