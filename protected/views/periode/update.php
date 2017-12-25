<?php
/* @var $this PeriodeController */
/* @var $model Periode */

$this->breadcrumbs=array(
	'Periodes'=>array('index'),
	$model->id_periode=>array('view','id'=>$model->id_periode),
	'Update',
);

$this->menu=array(
	array('label'=>'List Periode', 'url'=>array('index')),
	array('label'=>'Create Periode', 'url'=>array('create')),
	array('label'=>'View Periode', 'url'=>array('view', 'id'=>$model->id_periode)),
	array('label'=>'Manage Periode', 'url'=>array('admin')),
);
?>

<h1>Update Periode <?php echo $model->id_periode; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>