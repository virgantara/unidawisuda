<?php
/* @var $this SettingController */
/* @var $data Setting */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_post')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_post), array('view', 'id'=>$data->id_post)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('kode_setting')); ?>:</b>
	<?php echo CHtml::encode($data->kode_setting); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('konten')); ?>:</b>
	<?php echo CHtml::encode($data->konten); ?>
	<br />


</div>