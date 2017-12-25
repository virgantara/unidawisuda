<?php
/* @var $this PeriodeController */
/* @var $data Periode */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_periode')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_periode), array('view', 'id'=>$data->id_periode)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nama_periode')); ?>:</b>
	<?php echo CHtml::encode($data->nama_periode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tahun')); ?>:</b>
	<?php echo CHtml::encode($data->tahun); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_buka')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_buka); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tanggal_tutup')); ?>:</b>
	<?php echo CHtml::encode($data->tanggal_tutup); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status_aktivasi')); ?>:</b>
	<?php echo CHtml::encode($data->status_aktivasi); ?>
	<br />


</div>