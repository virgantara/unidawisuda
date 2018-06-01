<?php
/* @var $this PeriodeController */
/* @var $model Periode */

$this->breadcrumbs=array(
	'Periodes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Periode', 'url'=>array('index')),
	array('label'=>'Create Periode', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#periode-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Periodes</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'periode-grid',
	'dataProvider'=>$model->search(),

	'columns'=>array(
		'id_periode',
		'nama_periode',
		'tahun',
		'tanggal_buka',
		'tanggal_tutup',
		'status_aktivasi',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
