<?php

if(empty($model->nim))
	Yii::app()->user->setState("nim", null);
/* @var $this PesertaController */
/* @var $model Peserta */
/* @var $form CActiveForm */

$listkampus = array(
		'1' => 'Siman',
		'2' => 'Gontor',
		'3' => 'Mantingan',
		'4' => 'Kediri',
		'5' => 'Kandangan',
		'6' => 'Magelang'
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

	    // $('#Peserta_fakultas').change(function(){
	    // 	$.ajax({
	    // 		url : '<?php echo Yii::app()->createUrl('peserta/getProdi');?>',
	    // 		type : 'POST',
	    // 		data : 'nama='+$(this).val(),
	    // 		beforeSend : function(){
	    // 			$('#loading').show();
	    // 		},
	    // 		success : function(data){
	    // 			$('#loading').hide();
	    // 			var hasil = JSON.parse(data);
	    // 			$('#Peserta_prodi').empty();
	    // 			var row = '';
	    // 			$.each(hasil, function(index,item){
	    // 				 $('#Peserta_prodi').append($('<option>', { 
					//         value: item.nama,
					//         text : item.nama 
					//     }));
	    				
	    // 			});

	    // 		}
	    // 	});
	    // });

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

	<?=$form->errorSummary($model,'<div style="color:red">','</div>');?>
	<div class="row">

		<?php 
		
		echo '<h3>Kode Pendaftaran: '.$kode_unik.'</h3>';
		echo $form->hiddenField($model,'kode_pendaftaran',array('size'=>50,'maxlength'=>50)); 
		?>
		<?php echo $form->error($model,'kode_pendaftaran'); ?>
	</div>
	<table>
		<tr>
			<td>	<?php echo $form->labelEx($model,'nim'); ?>
		<p>
		<?php echo $form->textField($model,'nim'); ?><br>
		<small>Ketik NIM Anda. Jika sudah, tekan Ctrl + Enter</small>
	</p>
		<?php echo $form->error($model,'nim'); ?></td>
			<td><p><?php echo $form->labelEx($model,'nama_lengkap'); ?>
		<?php echo $form->textField($model,'nama_lengkap',['readonly'=>'readonly']); ?><br>  &nbsp;
		<?php echo $form->error($model,'nama_lengkap'); ?>
</p>
	</td>
		</tr>
		<tr>
			<td colspan="2">	<?php echo $form->labelEx($model,'kampus'); ?>
		<?php 
		echo $form->textField($model,'kampus',['readonly'=>'readonly']); ?>
		<?php echo $form->error($model,'kampus'); ?></td>
		</tr>
		
		<tr>
			<td>
			<?php echo $form->labelEx($model,'fakultas'); ?>
		<?php 
		
		// $list = CHtml::listData(Fakultas::model()->findAll(),'nama_fakultas','nama_fakultas');
		echo $form->textField($model,'fakultas',['readonly'=>'readonly']); 
		?>
		<?php echo $form->error($model,'fakultas'); ?>
		</td>
			<td>
			<?php echo $form->labelEx($model,'prodi'); ?>

		<?php 
		$list = array();
		echo $form->textField($model,'prodi',['readonly'=>'readonly']); 

		?>
		<img id="loading" style="display: none" src="<?php echo Yii::app()->baseUrl;?>/images/loading.gif"/>
		<?php echo $form->error($model,'prodi'); ?>
		</td>
		</tr>
		<tr>
			<td>
			<?php echo $form->labelEx($model,'tempat_lahir'); ?>
		<?php echo $form->textField($model,'tempat_lahir',['readonly'=>'readonly']); ?>
		<?php echo $form->error($model,'tempat_lahir'); ?>
		</td>
			<td>
			<?php echo $form->labelEx($model,'tanggal_lahir'); ?>
		<?php echo $form->textField($model,'tanggal_lahir',['readonly'=>'readonly']); ?>
		<?php echo $form->error($model,'tanggal_lahir'); ?>
		</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->labelEx($model,'jenis_kelamin'); ?>
		<?php 
		
		echo $form->textField($model,'jenis_kelamin',['readonly'=>'readonly']); 
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
		<?php echo $form->textField($model,'status_warga',['readonly'=>'readonly']); ?>
		<?php echo $form->error($model,'status_warga'); ?>
		</td>
			<td>
			<?php echo $form->labelEx($model,'warga_negara'); ?>
		<?php echo $form->textField($model,'warga_negara',['readonly'=>'readonly']); ?>
		<?php echo $form->error($model,'warga_negara'); ?>
		</td>
		</tr>
		<tr>
			<td colspan="2">
			<?php echo $form->labelEx($model,'alamat'); ?>
		<?php echo $form->textArea($model,'alamat',['readonly'=>'readonly','rows'=>5,'cols'=>50]); ?>
		<?php echo $form->error($model,'alamat'); ?>
		</td>
		</tr>
		<tr>
			<td colspan="2">
			<?php echo $form->labelEx($model,'no_telp'); ?>
		<?php echo $form->textField($model,'no_telp',['readonly'=>'readonly']); ?>
		<?php echo $form->error($model,'no_telp'); ?>
		</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->labelEx($model,'nama_ayah'); ?>
		<?php echo $form->textField($model,'nama_ayah',['readonly'=>'readonly']); ?>
		<?php echo $form->error($model,'nama_ayah'); ?>
		</td>
			<td>
			<?php echo $form->labelEx($model,'pekerjaan_ayah'); ?>
		<?php echo $form->textField($model,'pekerjaan_ayah',['readonly'=>'readonly']); ?>
		<?php echo $form->error($model,'pekerjaan_ayah'); ?>
		</td>
		</tr>
		<tr>
			<td>
				<?php echo $form->labelEx($model,'nama_ibu'); ?>
		<?php echo $form->textField($model,'nama_ibu',['readonly'=>'readonly']); ?>
		<?php echo $form->error($model,'nama_ibu'); ?>
		</td>
			<td>
			<?php echo $form->labelEx($model,'pekerjaan_ibu'); ?>
		<?php echo $form->textField($model,'pekerjaan_ibu',['readonly'=>'readonly']); ?>
		<?php echo $form->error($model,'pekerjaan_ibu'); ?>
		</td>
		</tr>
		<tr>
			<td colspan="2">	<?php echo $form->labelEx($model,'kmi'); ?>
		<?php echo $form->dropDownList($model,'kmi',$listkmi,array('empty'=>'- Pilih Item -')); ?>
		<?php echo $form->error($model,'kmi'); ?></td>
		</tr>
		
		<tr>
			<td colspan="2">
				<?php echo $form->labelEx($model,'drive_path'); ?>
				<small>
			<p>Silakan unggah semua persyaratan di Google Drive masing-masing. Kemudian, salin tautan folder tersebut dan tempel di kotak Alamat share link Google Drive berikut:
			<a target="_blank" href="https://www.youtube.com/watch?v=HUX61hqxTBw">Tutorial share Google Drive</a></p></small>
		<?php echo $form->textArea($model,'drive_path',['rows'=>5,'cols'=>50]); ?><br>

		<?php echo $form->error($model,'drive_path'); ?>
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
<script type="text/javascript">

$(document).on('keydown','#Peserta_nim',function(e){
	

	var key = e.charCode ? e.charCode : e.keyCode ? e.keyCode : 0;
    
    if (e.ctrlKey && e.keyCode == 13) {
    	e.preventDefault();
		$.ajax({
			type : 'POST',
			url : '<?=Yii::app()->createUrl('AjaxRequest/GetProfilMhs');?>',
			data : 'nim='+$(this).val(),
			error: function(e){
				console.log(e.responseText);
			},
			beforeSend : function(){

			},
			success : function(data){
				var hasil = $.parseJSON(data);
				$('#Peserta_nama_lengkap').val(hasil.mhs.nama_mahasiswa);
				$('#Peserta_kampus').val(hasil.mhs.nama_kampus);
				$('#Peserta_fakultas').val(hasil.mhs.nama_fakultas);
				$('#Peserta_prodi').val(hasil.mhs.nama_prodi);
				$('#Peserta_tempat_lahir').val(hasil.mhs.tempat_lahir);
				$('#Peserta_tanggal_lahir').val(hasil.mhs.tgl_lahir);
				$('#Peserta_jenis_kelamin').val(hasil.mhs.jenis_kelamin);
				$('#Peserta_no_telp').val(hasil.mhs.telepon);
				$('#Peserta_status_warga').val(hasil.mhs.sw);
				$('#Peserta_warga_negara').val(hasil.mhs.wn);
				var alamat = hasil.mhs.alamat + ' ' +hasil.mhs.desa  + ' ' +hasil.mhs.kecamatan  + ' ' +hasil.mhs.kab  + ' ' +hasil.mhs.prov 
				$('#Peserta_alamat').val(alamat);

				$.each(hasil.ortu,function(i,obj){
					if(obj.hub == 'IBU'){
						$('#Peserta_nama_ibu').val(obj.nm);
						$('#Peserta_pekerjaan_ibu').val(obj.label);						
					}

					else if(obj.hub == 'AYAH'){
						$('#Peserta_nama_ayah').val(obj.nm);
						$('#Peserta_pekerjaan_ayah').val(obj.label);						
					}
				});
			}

		});
	}

	else if(e.keyCode == 13){
		e.preventDefault();
	}
});
</script>