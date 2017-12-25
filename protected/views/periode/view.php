<?php
/* @var $this PeriodeController */
/* @var $model Periode */

$this->breadcrumbs=array(
	'Periodes'=>array('index'),
	$model->id_periode,
);

$this->menu=array(
	array('label'=>'List Periode', 'url'=>array('index')),
	array('label'=>'Create Periode', 'url'=>array('create')),
	array('label'=>'Update Periode', 'url'=>array('update', 'id'=>$model->id_periode)),
	array('label'=>'Delete Periode', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_periode),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Periode', 'url'=>array('admin')),
);
?>

<h1>View Periode #<?php echo $model->id_periode; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_periode',
		'nama_periode',
		'tahun',
		'tanggal_buka',
		'tanggal_tutup',
		'status_aktivasi',
	),
)); ?>
