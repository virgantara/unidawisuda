<?php
/* @var $this PesertaController */
/* @var $model Peserta */

$this->breadcrumbs=array(
	'Pesertas'=>array('index'),
	'Manage',
);

// $this->menu=array(
// 	array('label'=>'List Peserta', 'url'=>array('index')),
// 	array('label'=>'Create Peserta', 'url'=>array('create')),
// );

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

<h1>Peserta</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'peserta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
			'header' => 'No',
			'value'	=> '$this->grid->dataProvider->pagination->currentPage * $this->grid->dataProvider->pagination->pageSize + ($row+1)',
		),
		'nim',
		'kampus',
		'nama_lengkap',
		'fakultas',
		'prodi',
		'tempat_lahir',
		
		'tanggal_lahir',
		/*
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
		
	),
)); ?>
