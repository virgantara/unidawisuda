<?php
/* @var $this PesertaController */
/* @var $model Peserta */

$this->breadcrumbs=array(
	'Pesertas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Peserta', 'url'=>array('index')),
	array('label'=>'Create Peserta', 'url'=>array('create')),
	array('label'=>'Update Peserta', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Peserta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Peserta', 'url'=>array('admin')),
);
?>

<h1>View Peserta #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nim',
		'nama_lengkap',
		'fakultas',
		'prodi',
		'tempat_lahir',
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
	),
)); ?>
