<?php
/* @var $this PesertaController */
/* @var $model Peserta */

$this->breadcrumbs=array(
	'Pesertas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Peserta', 'url'=>array('index')),
	array('label'=>'Create Peserta', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#peserta-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pesertas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'peserta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nim',
		'nama_lengkap',
		'fakultas',
		'prodi',
		'tempat_lahir',
		/*
		'tanggal_lahir',
		'jenis_kelamin',
		'status_warga',
		'warga_negara',
		'alamat',
		'no_telp',
		'nama_ayah',
		'pekerjaan_ayah',
		'nama_ibu',
		'pekerjaan_ibu',
		'pas_photo',
		'ijazah',
		'akta_kelahiran',
		'kwitansi_jilid',
		'surat_bebas_pinjaman',
		'resume_skripsi',
		'surat_bebas_tunggakan',
		'transkrip',
		'skl_tahfidz',
		'kwitansi_wisuda',
		'tanda_keluar_asrama',
		'surat_jalan',
		'skripsi',
		'abstrak',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
