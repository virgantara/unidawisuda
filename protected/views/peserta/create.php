<?php
/* @var $this PesertaController */
/* @var $model Peserta */

$this->breadcrumbs=array(
	'Peserta'=>array('index'),
	'Pendaftaran',
);

// $this->menu=array(
// 	array('label'=>'List Peserta', 'url'=>array('index')),
// 	array('label'=>'Manage Peserta', 'url'=>array('admin')),
// );
?>

<h1>Pendaftaran Peserta WISUDA</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>