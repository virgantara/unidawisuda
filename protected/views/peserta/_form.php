<?php

if(empty($model->nim))
	Yii::app()->user->setState("nim", null);
/* @var $this PesertaController */
/* @var $model Peserta */
/* @var $form CActiveForm */

$listkampus = array(
		'Siman' => 'Siman',
		'Gontor' => 'Gontor',
		'Mantingan' => 'Mantingan',
		'Kediri' => 'Kediri',
		'Kandangan' => 'Kandangan',
		'Magelang' => 'Magelang'
	);

$listkmi = array(
		'KMI' => 'KMI',
		'Non-KMI' => 'Non-KMI',
		
	);

?>
<noscript>Silakan aktifkan javascript dulu</noscript>
<style type="text/css">
	input[type=button], input[type=submit]{
		padding:5px 10px;
	}

	td.col {
		border-bottom: 1px solid gray;
		border-style: dashed;
	}
</style>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo Yii::app()->baseUrl; ?>/js/dobPicker.id.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$.dobPicker({
	      daySelector: '#dobday', /* Required */
	      monthSelector: '#dobmonth', /* Required */
	      yearSelector: '#dobyear', /* Required */
	      dayDefault: 'Day', /* Optional */
	      monthDefault: 'Month', /* Optional */
	      yearDefault: 'Year', /* Optional */
	      minimumAge: 12, /* Optional */
	      maximumAge: 80 /* Optional */
	    });

	    $('#btnsimpan').click(function(e){
	    	e.preventDefault();

	    	$('#dialog').dialog("open");
	    });

	    $('#simpan').click(function(e){
	    	$('#peserta-form').submit();
	    });

	    $('#batal').click(function(e){
	    	$('#dialog').dialog("close");
	    });

	    $('#dobyear').change(function(){

	      var y = $(this).val();
	      var m = $('#dobmonth').val();
	      var d = $('#dobday').val();

	      $('#Peserta_tanggal_lahir').val(y+'-'+m+'-'+d);      
	    });

	    $('#Peserta_fakultas').change(function(){
	    	$.ajax({
	    		url : '<?php echo Yii::app()->createUrl('peserta/getProdi');?>',
	    		type : 'POST',
	    		data : 'nama='+$(this).val(),
	    		beforeSend : function(){
	    			$('#loading').show();
	    		},
	    		success : function(data){
	    			$('#loading').hide();
	    			var hasil = JSON.parse(data);
	    			$('#Peserta_prodi').empty();
	    			var row = '';
	    			$.each(hasil, function(index,item){
	    				 $('#Peserta_prodi').append($('<option>', { 
					        value: item.nama,
					        text : item.nama 
					    }));
	    				
	    			});

	    		}
	    	});
	    });

	    $('#Peserta_nim').focusout(function(){
	    	$.ajax({
	    		url : '<?php echo Yii::app()->createUrl('peserta/setSessionNIM');?>',
	    		type : 'POST',
	    		data : 'nim='+$(this).val(),
	    		success : function(data){
	    		}
	    	});
	    });
	});
</script>

<div class="form">

 <?php

$kode_unik = Yii::app()->helper->generateUniqueCode(6);
		$model->kode_pendaftaran = $kode_unik;

?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'peserta-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	
	<div class="row">

		<?php 
		
		echo '<h3>Kode Pendaftaran: '.$kode_unik.'</h3>';
		echo $form->hiddenField($model,'kode_pendaftaran',array('size'=>50,'maxlength'=>50)); 
		?>
		<?php echo $form->error($model,'kode_pendaftaran'); ?>
	</div>
	<table>
		<tr>
			<td colspan="2">	<?php echo $form->labelEx($model,'kampus'); ?>
		<?php echo $form->dropDownList($model,'kampus',$listkampus,array('empty'=>'- Pilih Kampus -')); ?>
		<?php echo $form->error($model,'kampus'); ?></td>
		</tr>
		<tr>
			<td colspan="2">	<?php echo $form->labelEx($model,'kmi'); ?>
		<?php echo $form->dropDownList($model,'kmi',$listkmi,array('empty'=>'- Pilih Item -')); ?>
		<?php echo $form->error($model,'kmi'); ?></td>
		</tr>
		<tr>
			<td>	<?php echo $form->labelEx($model,'nim'); ?>
		<?php echo $form->textField($model,'nim',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'nim'); ?></td>
			<td><?php echo $form->labelEx($model,'nama_lengkap'); ?>
		<?php echo $form->textField($model,'nama_lengkap',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nama_lengkap'); ?></td>
		</tr>
		<tr>
			<td>
			<?php echo $form->labelEx($model,'fakultas'); ?>
		<?php 
		
		$list = CHtml::listData(Fakultas::model()->findAll(),'nama_fakultas','nama_fakultas');
		echo $form->dropDownList($model,'fakultas',$list,array(
        'empty'=>'--Pilih Fakultas--')); 
		?>
		<?php echo $form->error($model,'fakultas'); ?>
		</td>
			<td>
			<?php echo $form->labelEx($model,'prodi'); ?>

		<?php 
		$list = array();
		echo $form->dropDownList($model,'prodi',$list); 

		?>
		<img id="loading" style="display: none" src="<?php echo Yii::app()->baseUrl;?>/images/loading.gif"/>
		<?php echo $form->error($model,'prodi'); ?>
		</td>
		</tr>
		<tr>
			<td>
			<?php echo $form->labelEx($model,'tempat_lahir'); ?>
		<?php echo $form->textField($model,'tempat_lahir',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'tempat_lahir'); ?>
		</td>
			<td>
			<?php echo $form->labelEx($model,'tanggal_lahir'); ?>
			<select id="dobday" class="form-control"></select>
			<select id="dobmonth" class="form-control"></select>
			<select id="dobyear" class="form-control"></select>
		<?php echo $form->hiddenField($model,'tanggal_lahir',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'tanggal_lahir'); ?>
		</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->labelEx($model,'jenis_kelamin'); ?>
		<?php 
		
		$jklist = array(
				'Laki-laki' => 'Laki-laki',
				'Perempuan' => 'Perempuan'
			);
		echo $form->dropDownList($model,'jenis_kelamin',$jklist); 
		?>
		<?php echo $form->error($model,'jenis_kelamin'); ?>
		</td>
			<td>
			&nbsp;
		</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->labelEx($model,'status_warga'); ?>
		<?php echo $form->textField($model,'status_warga',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'status_warga'); ?>
		</td>
			<td>
			<?php echo $form->labelEx($model,'warga_negara'); ?>
		<?php echo $form->textField($model,'warga_negara',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'warga_negara'); ?>
		</td>
		</tr>
		<tr>
			<td colspan="2">
			<?php echo $form->labelEx($model,'alamat'); ?>
		<?php echo $form->textArea($model,'alamat',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'alamat'); ?>
		</td>
		</tr>
		<tr>
			<td colspan="2">
			<?php echo $form->labelEx($model,'no_telp'); ?>
		<?php echo $form->textField($model,'no_telp',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'no_telp'); ?>
		</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->labelEx($model,'nama_ayah'); ?>
		<?php echo $form->textField($model,'nama_ayah',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nama_ayah'); ?>
		</td>
			<td>
			<?php echo $form->labelEx($model,'pekerjaan_ayah'); ?>
		<?php echo $form->textField($model,'pekerjaan_ayah',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'pekerjaan_ayah'); ?>
		</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->labelEx($model,'nama_ibu'); ?>
		<?php echo $form->textField($model,'nama_ibu',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nama_ibu'); ?>
		</td>
			<td>
			<?php echo $form->labelEx($model,'pekerjaan_ibu'); ?>
		<?php echo $form->textField($model,'pekerjaan_ibu',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'pekerjaan_ibu'); ?>
		</td>
		</tr>
	</table>


	<table id="table-upload">
	<tr>
		<td class="col"><?php echo $form->labelEx($model,'pas_photo'); ?></td>
		<td class="col"><?php


  $this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadPasPhoto',
        'config'=>array(
               'action'=>Yii::app()->createUrl('peserta/uploadPasPhoto'),
               'allowedExtensions'=>array("jpg","png"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>2*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>512,// minimum file size in bytes
               'onComplete'=>"js:function(id, fileName, responseJSON){ 

               		$('#Peserta_pas_photo').val(responseJSON.filename);
               	 }",
               'messages'=>array(
                                'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                'emptyError'=>"{file} is empty, please select files again without it.",
                                'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                               ),
               'showMessage'=>"js:function(message){ alert(message); }"
              )
)); 
		 echo $form->hiddenField($model,'pas_photo');
		 echo $form->error($model,'pas_photo'); ?>
		</td>
	</tr>
	<tr>
		<td class="col"><?php echo $form->labelEx($model,'ijazah'); ?></td>
		<td class="col"><?php

  $this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadIjazah',
        'config'=>array(
               'action'=>Yii::app()->createUrl('peserta/uploadIjazah'),
               'allowedExtensions'=>array("jpg","png","pdf"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>2*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>512,// minimum file size in bytes
               'onComplete'=>"js:function(id, fileName, responseJSON){ 
               		$('#Peserta_ijazah').val(responseJSON.filename);
               	 }",
               'messages'=>array(
                                'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                'emptyError'=>"{file} is empty, please select files again without it.",
                                'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                               ),
               'showMessage'=>"js:function(message){ alert(message); }"
              )
)); 
		 echo $form->hiddenField($model,'ijazah');
		 echo $form->error($model,'ijazah'); ?>
		</td>
	</tr>
	<tr>
		<td class="col"><?php echo $form->labelEx($model,'akta_kelahiran'); ?></td>
		<td class="col"><?php
$this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadAkta',
        'config'=>array(
               'action'=>Yii::app()->createUrl('peserta/uploadAKta'),
               'allowedExtensions'=>array("jpg","png","pdf"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>2*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>512,// minimum file size in bytes
               'onComplete'=>"js:function(id, fileName, responseJSON){ 
               		$('#Peserta_akta_kelahiran').val(responseJSON.filename);
               	 }",
               'messages'=>array(
                                'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                'emptyError'=>"{file} is empty, please select files again without it.",
                                'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                               ),
               'showMessage'=>"js:function(message){ alert(message); }"
              )
)); 
		 echo $form->hiddenField($model,'akta_kelahiran');
		 echo $form->error($model,'akta_kelahiran'); ?>
		</td>
	</tr>
	<tr>
		<td class="col"><?php echo $form->labelEx($model,'kwitansi_jilid'); ?></td>
		<td class="col"><?php
$this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadkwitansi_jilid',
        'config'=>array(
               'action'=>Yii::app()->createUrl('peserta/uploadKwitansiJilid'),
               'allowedExtensions'=>array("jpg","png","pdf"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>2*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>512,// minimum file size in bytes
               'onComplete'=>"js:function(id, fileName, responseJSON){ 
               		$('#Peserta_kwitansi_jilid').val(responseJSON.filename);
               	 }",
               'messages'=>array(
                                'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                'emptyError'=>"{file} is empty, please select files again without it.",
                                'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                               ),
               'showMessage'=>"js:function(message){ alert(message); }"
              )
)); 

		 echo $form->hiddenField($model,'kwitansi_jilid');
		 echo $form->error($model,'kwitansi_jilid'); ?>
		</td>
	</tr>
		
	<tr>
		<td class="col"><?php echo $form->labelEx($model,'surat_bebas_pinjaman'); ?>
			<small>(filetype: pdf)</small>
		</td>
		<td class="col"><?php
$this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadsurat_bebas_pinjaman',
        'config'=>array(
               'action'=>Yii::app()->createUrl('peserta/uploadSBP'),
               'allowedExtensions'=>array("pdf"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>2*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>512,// minimum file size in bytes
               'onComplete'=>"js:function(id, fileName, responseJSON){ 
               		$('#Peserta_surat_bebas_pinjaman').val(responseJSON.filename);
               	 }",
               'messages'=>array(
                                'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                'emptyError'=>"{file} is empty, please select files again without it.",
                                'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                               ),
               'showMessage'=>"js:function(message){ alert(message); }"
              )
)); 
		 echo $form->hiddenField($model,'surat_bebas_pinjaman');
		 echo $form->error($model,'surat_bebas_pinjaman'); ?>
		</td>
	</tr>
	<tr>
		<td class="col"><?php echo $form->labelEx($model,'resume_skripsi'); ?>
		<small>(filetype: doc)</small></td>
		<td class="col"><?php
$this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadresume_skripsi',
        'config'=>array(
               'action'=>Yii::app()->createUrl('peserta/uploadResume'),
               'allowedExtensions'=>array("doc"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>10*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>512,// minimum file size in bytes
               'onComplete'=>"js:function(id, fileName, responseJSON){ 
               		$('#Peserta_resume_skripsi').val(responseJSON.filename);
               	 }",
               'messages'=>array(
                                'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                'emptyError'=>"{file} is empty, please select files again without it.",
                                'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                               ),
               'showMessage'=>"js:function(message){ alert(message); }"
              )
)); 		
	 echo $form->hiddenField($model,'resume_skripsi');
		 echo $form->error($model,'resume_skripsi'); ?>
		</td>
	</tr>
	<tr>
		<td class="col"><?php echo $form->labelEx($model,'surat_bebas_tunggakan'); ?></td>
		<td class="col"><?php

$this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadsurat_bebas_tunggakan',
        'config'=>array(
               'action'=>Yii::app()->createUrl('peserta/uploadSBT'),
               'allowedExtensions'=>array("jpg","png","pdf"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>2*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>512,// minimum file size in bytes
               'onComplete'=>"js:function(id, fileName, responseJSON){ 
               		$('#Peserta_surat_bebas_tunggakan').val(responseJSON.filename);
               	 }",
               'messages'=>array(
                                'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                'emptyError'=>"{file} is empty, please select files again without it.",
                                'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                               ),
               'showMessage'=>"js:function(message){ alert(message); }"
              )
)); 
		 echo $form->hiddenField($model,'surat_bebas_tunggakan');
		 echo $form->error($model,'surat_bebas_tunggakan'); ?>
		</td>
	</tr>
	<tr>
		<td class="col"><?php echo $form->labelEx($model,'transkrip'); ?></td>
		<td class="col"><?php

$this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadtranskrip',
        'config'=>array(
               'action'=>Yii::app()->createUrl('peserta/uploadTranskrip'),
               'allowedExtensions'=>array("jpg","png","pdf"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>2*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>512,// minimum file size in bytes
               'onComplete'=>"js:function(id, fileName, responseJSON){ 
               		$('#Peserta_transkrip').val(responseJSON.filename);
               	 }",
               'messages'=>array(
                                'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                'emptyError'=>"{file} is empty, please select files again without it.",
                                'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                               ),
               'showMessage'=>"js:function(message){ alert(message); }"
              )
)); 		 
echo $form->hiddenField($model,'transkrip');
		 echo $form->error($model,'transkrip'); ?>
		</td>
	</tr>
	<tr>
		<td class="col"><?php echo $form->labelEx($model,'skl_tahfidz'); ?></td>
		<td class="col"><?php
$this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadskl_tahfidz',
        'config'=>array(
               'action'=>Yii::app()->createUrl('peserta/uploadSKL'),
               'allowedExtensions'=>array("jpg","png","pdf"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>2*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>512,// minimum file size in bytes
               'onComplete'=>"js:function(id, fileName, responseJSON){ 
               		$('#Peserta_skl_tahfidz').val(responseJSON.filename);
               	 }",
               'messages'=>array(
                                'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                'emptyError'=>"{file} is empty, please select files again without it.",
                                'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                               ),
               'showMessage'=>"js:function(message){ alert(message); }"
              )
)); 	
		 echo $form->hiddenField($model,'skl_tahfidz');
		 echo $form->error($model,'skl_tahfidz'); ?>
		</td>
	</tr>
	<tr>
		<td class="col"><?php echo $form->labelEx($model,'kwitansi_wisuda'); ?></td>
		<td class="col"><?php
$this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadkwitansi_wisuda',
        'config'=>array(
               'action'=>Yii::app()->createUrl('peserta/uploadKwitansiWisuda'),
               'allowedExtensions'=>array("jpg","png","pdf"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>2*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>512,// minimum file size in bytes
               'onComplete'=>"js:function(id, fileName, responseJSON){ 
               		$('#Peserta_kwitansi_wisuda').val(responseJSON.filename);
               	 }",
               'messages'=>array(
                                'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                'emptyError'=>"{file} is empty, please select files again without it.",
                                'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                               ),
               'showMessage'=>"js:function(message){ alert(message); }"
              )
)); 	
		 
echo $form->hiddenField($model,'kwitansi_wisuda');

		 echo $form->error($model,'kwitansi_wisuda'); ?>
		</td>
	</tr>
	<tr>
		<td class="col"><?php echo $form->labelEx($model,'tanda_keluar_asrama'); ?>
			<small>Khusus Mahasiswa Siman</small>
		</td>
		<td class="col"><?php


$this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadtanda_keluar_asrama',
        'config'=>array(
               'action'=>Yii::app()->createUrl('peserta/uploadTandaKeluar'),
               'allowedExtensions'=>array("jpg","png","pdf"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>2*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>512,// minimum file size in bytes
               'onComplete'=>"js:function(id, fileName, responseJSON){ 
               		$('#Peserta_tanda_keluar_asrama').val(responseJSON.filename);
               	 }",
               'messages'=>array(
                                'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                'emptyError'=>"{file} is empty, please select files again without it.",
                                'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                               ),
               'showMessage'=>"js:function(message){ alert(message); }"
              )
)); 	
		 
		 echo $form->hiddenField($model,'tanda_keluar_asrama');
		 echo $form->error($model,'tanda_keluar_asrama'); ?>
		</td>
	</tr>
	<tr>
		<td class="col"><?php echo $form->labelEx($model,'surat_jalan'); ?>
			<small>Khusus Mahasiswa Siman</small>
		</td>
		<td class="col"><?php

$this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadsurat_jalan',
        'config'=>array(
               'action'=>Yii::app()->createUrl('peserta/uploadSuratJalan'),
               'allowedExtensions'=>array("jpg","png","pdf"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>2*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>512,// minimum file size in bytes
               'onComplete'=>"js:function(id, fileName, responseJSON){ 
               		$('#Peserta_surat_jalan').val(responseJSON.filename);
               	 }",
               'messages'=>array(
                                'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                'emptyError'=>"{file} is empty, please select files again without it.",
                                'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                               ),
               'showMessage'=>"js:function(message){ alert(message); }"
              )
)); 	
		 echo $form->hiddenField($model,'surat_jalan');
		 echo $form->error($model,'surat_jalan'); ?>
		</td>
	</tr>
	<tr>
		<td class="col"><?php echo $form->labelEx($model,'skripsi'); ?>
			<small>(filetype: pdf)</small>

		</td >
		<td class="col"><?php

$this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadskripsi',
        'config'=>array(
               'action'=>Yii::app()->createUrl('peserta/uploadSkripsi'),
               'allowedExtensions'=>array("pdf"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>10*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>512,// minimum file size in bytes
               'onComplete'=>"js:function(id, fileName, responseJSON){ 
               		$('#Peserta_skripsi').val(responseJSON.filename);
               	 }",
               'messages'=>array(
                                'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                'emptyError'=>"{file} is empty, please select files again without it.",
                                'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                               ),
               'showMessage'=>"js:function(message){ alert(message); }"
              )
)); 	
		 echo $form->hiddenField($model,'skripsi');
		 echo $form->error($model,'skripsi'); ?>
		</td>
	</tr>	
	<tr>
		<td class="col"><?php echo $form->labelEx($model,'abstrak'); ?>
			<small>(filetype: doc)</small>
		</td>
		<td class="col"><?php

$this->widget('ext.EAjaxUpload.EAjaxUpload',
array(
        'id'=>'uploadabstrak',
        'config'=>array(
               'action'=>Yii::app()->createUrl('peserta/uploadAbstrak'),
               'allowedExtensions'=>array("doc"),//array("jpg","jpeg","gif","exe","mov" and etc...
               'sizeLimit'=>10*1024*1024,// maximum file size in bytes
               'minSizeLimit'=>512,// minimum file size in bytes
               'onComplete'=>"js:function(id, fileName, responseJSON){ 
               		$('#Peserta_abstrak').val(responseJSON.filename);
               	 }",
               'messages'=>array(
                                'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                'emptyError'=>"{file} is empty, please select files again without it.",
                                'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
                               ),
               'showMessage'=>"js:function(message){ alert(message); }"
              )
)); 	
		 echo $form->hiddenField($model,'abstrak');
		 echo $form->error($model,'abstrak'); ?>
		</td>
	</tr>	
	
	</table>


	<div class="row buttons">
		<?php echo CHtml::submitButton('SIMPAN',array('id' => 'btnsimpan')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

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
<p>Apakah data Anda sudah benar?</p>
<input type="button" id="simpan" value="Ok"/>
<input type="button" id="batal" value="Batal"/>
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>