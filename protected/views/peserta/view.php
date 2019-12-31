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

<p><button id="btn-validate" class="btn">Validasi Data</button></p>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		 array(
		 	'label'=>'Status Eligible',
            'type'=>'raw',
        	'value'=>function($data){
        		return $data->status_validasi == 'VALID' ? '<div style="background-color:green;color:white;padding:3px 3px 3px 3px">ELIGIBLE untuk WISUDA</div>' : '<div style="background-color:red;color:white;padding:3px 3px 3px 3px">BELUM BERHAK WISUDA</div>';
        	}
        ),   
		'kmi',
		'kampus',
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
		 array(
		 	'label'=>'Foto',
            'type'=>'raw',
        	'value'=>CHtml::link(CHtml::encode($model->pas_photo), Yii::app()->baseUrl.'/uploads/pas_photo/'.$model->pas_photo)
        ),

		array(
		 	'label'=>'Ijazah',
            'type'=>'raw',
        	'value'=>CHtml::link(CHtml::encode($model->ijazah), Yii::app()->baseUrl.'/uploads/ijazah/'.$model->ijazah)
        ),
        array(
		 	'label'=>'Akta Kelahiran',
            'type'=>'raw',
        	'value'=>CHtml::link(CHtml::encode($model->akta_kelahiran), Yii::app()->baseUrl.'/uploads/akta_kelahiran/'.$model->akta_kelahiran)
        ),
		 // array(
		 // 	'label'=>'Kwitansi Penjilidan',
   //          'type'=>'raw',
   //      	'value'=>CHtml::link(CHtml::encode($model->kwitansi_jilid), Yii::app()->baseUrl.'/uploads/kwitansi_jilid/'.$model->kwitansi_jilid)
   //      ),
		 array(
		 	'label'=>'Surat Bebas Pinjaman',
            'type'=>'raw',
        	'value'=>CHtml::link(CHtml::encode($model->surat_bebas_pinjaman), Yii::app()->baseUrl.'/uploads/surat_bebas_pinjaman/'.$model->surat_bebas_pinjaman)
        ),
		 array(
		 	'label'=>'Resume Skripsi',
            'type'=>'raw',
        	'value'=>CHtml::link(CHtml::encode($model->resume_skripsi), Yii::app()->baseUrl.'/uploads/resume_skripsi/'.$model->resume_skripsi)
        ),
		  array(
		 	'label'=>'Surat Bebas Tunggakan',
            'type'=>'raw',
        	'value'=>CHtml::link(CHtml::encode($model->surat_bebas_tunggakan), Yii::app()->baseUrl.'/uploads/surat_bebas_tunggakan/'.$model->surat_bebas_tunggakan)
        ),
		 array(
		 	'label'=>'Transkrip',
            'type'=>'raw',
        	'value'=>CHtml::link(CHtml::encode($model->transkrip), Yii::app()->baseUrl.'/uploads/transkrip/'.$model->transkrip)
        ),
		 array(
		 	'label'=>'Surat Keterangan Lulus Tahfidz',
            'type'=>'raw',
        	'value'=>CHtml::link(CHtml::encode($model->skl_tahfidz), Yii::app()->baseUrl.'/uploads/skl_tahfidz/'.$model->skl_tahfidz)
        ),
		 array(
		 	'label'=>'Kwitansi Wisuda',
            'type'=>'raw',
        	'value'=>CHtml::link(CHtml::encode($model->kwitansi_wisuda), Yii::app()->baseUrl.'/uploads/kwitansi_wisuda/'.$model->kwitansi_wisuda)
        ),
		 array(
		 	'label'=>'Tanda Keluar Asrama',
            'type'=>'raw',
        	'value'=>CHtml::link(CHtml::encode($model->tanda_keluar_asrama), Yii::app()->baseUrl.'/uploads/tanda_keluar_asrama/'.$model->tanda_keluar_asrama)
        ),
		 array(
		 	'label'=>'Surat Jalan',
            'type'=>'raw',
        	'value'=>CHtml::link(CHtml::encode($model->surat_jalan), Yii::app()->baseUrl.'/uploads/surat_jalan/'.$model->surat_jalan)
        ),
		  array(
		 	'label'=>'Skripsi',
            'type'=>'raw',
        	'value'=>CHtml::link(CHtml::encode($model->skripsi), Yii::app()->baseUrl.'/uploads/skripsi/'.$model->skripsi)
        ),
		   array(
		 	'label'=>'Abstrak',
            'type'=>'raw',
        	'value'=>CHtml::link(CHtml::encode($model->abstrak), Yii::app()->baseUrl.'/uploads/abstrak/'.$model->abstrak)
        ),
		 array(
		 	'label'=>'Bukti Revisi Bahasa dan Naskah Jurnal',
            'type'=>'raw',
        	'value'=>CHtml::link(CHtml::encode($model->bukti_revisi_bahasa), Yii::app()->baseUrl.'/uploads/bukti_revisi_bahasa/'.$model->bukti_revisi_bahasa)
        ),
        array(
		 	'label'=>'Bukti Layouter',
            'type'=>'raw',
        	'value'=>CHtml::link(CHtml::encode($model->bukti_layouter), Yii::app()->baseUrl.'/uploads/bukti_layouter/'.$model->bukti_layouter)
        ),   
         array(
		 	'label'=>'Bukti Perpus',
            'type'=>'raw',
        	'value'=>CHtml::link(CHtml::encode($model->bukti_perpus), Yii::app()->baseUrl.'/uploads/bukti_layouter/'.$model->bukti_perpus)
        ),   
         array(
		 	'label'=>'Link Google Drive',
            'type'=>'raw',
        	'value'=>CHtml::link('link ke GDrive',CHtml::encode($model->drive_path ?: '#'))
        ),   

         
	),
)); ?>

<?php 
$this->beginWidget('zii.widgets.jui.CJuiDialog',array(
    'id'=>'dialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Konfirmasi',
        'autoOpen'=>false,
    ),
));

?>
<p>Validasi Data Ini</p>
<input type="button" id="simpan" value="Ok"/>
<input type="button" id="batal" value="Batal"/>
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<script type="text/javascript">
	$(document).ready(function(){
		$('#btn-validate').click(function(e){
	    	
	    	$('#dialog').dialog("open");
	    });

	    $('#simpan').click(function(e){
	    	window.location = '<?=Yii::app()->createUrl('peserta/validasiData',['id'=>$model->id]);?>';
	    });

	    $('#batal').click(function(e){
	    	window.location = '<?=Yii::app()->createUrl('peserta/batalValidasiData',['id'=>$model->id]);?>';
	    });

	});
</script>