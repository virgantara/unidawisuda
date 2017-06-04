<?php
/* @var $this PesertaController */
/* @var $data Peserta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nim')); ?>:</b>
	<?php echo CHtml::encode($data->nim); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_lengkap')); ?>:</b>
	<?php echo CHtml::encode($data->nama_lengkap); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fakultas')); ?>:</b>
	<?php echo CHtml::encode($data->fakultas); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prodi')); ?>:</b>
	<?php echo CHtml::encode($data->prodi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tempat_lahir')); ?>:</b>
	<?php echo CHtml::encode($data->tempat_lahir); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_lahir')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_lahir); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('jenis_kelamin')); ?>:</b>
	<?php echo CHtml::encode($data->jenis_kelamin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_warga')); ?>:</b>
	<?php echo CHtml::encode($data->status_warga); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('warga_negara')); ?>:</b>
	<?php echo CHtml::encode($data->warga_negara); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('alamat')); ?>:</b>
	<?php echo CHtml::encode($data->alamat); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('no_telp')); ?>:</b>
	<?php echo CHtml::encode($data->no_telp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_ayah')); ?>:</b>
	<?php echo CHtml::encode($data->nama_ayah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pekerjaan_ayah')); ?>:</b>
	<?php echo CHtml::encode($data->pekerjaan_ayah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_ibu')); ?>:</b>
	<?php echo CHtml::encode($data->nama_ibu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pekerjaan_ibu')); ?>:</b>
	<?php echo CHtml::encode($data->pekerjaan_ibu); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pas_photo')); ?>:</b>
	<?php echo CHtml::encode($data->pas_photo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ijazah')); ?>:</b>
	<?php echo CHtml::encode($data->ijazah); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('akta_kelahiran')); ?>:</b>
	<?php echo CHtml::encode($data->akta_kelahiran); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kwitansi_jilid')); ?>:</b>
	<?php echo CHtml::encode($data->kwitansi_jilid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('surat_bebas_pinjaman')); ?>:</b>
	<?php echo CHtml::encode($data->surat_bebas_pinjaman); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('resume_skripsi')); ?>:</b>
	<?php echo CHtml::encode($data->resume_skripsi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('surat_bebas_tunggakan')); ?>:</b>
	<?php echo CHtml::encode($data->surat_bebas_tunggakan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('transkrip')); ?>:</b>
	<?php echo CHtml::encode($data->transkrip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skl_tahfidz')); ?>:</b>
	<?php echo CHtml::encode($data->skl_tahfidz); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kwitansi_wisuda')); ?>:</b>
	<?php echo CHtml::encode($data->kwitansi_wisuda); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanda_keluar_asrama')); ?>:</b>
	<?php echo CHtml::encode($data->tanda_keluar_asrama); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('surat_jalan')); ?>:</b>
	<?php echo CHtml::encode($data->surat_jalan); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skripsi')); ?>:</b>
	<?php echo CHtml::encode($data->skripsi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('abstrak')); ?>:</b>
	<?php echo CHtml::encode($data->abstrak); ?>
	<br />

	*/ ?>

</div>