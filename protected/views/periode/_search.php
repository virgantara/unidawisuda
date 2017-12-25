<?php
/* @var $this PeriodeController */
/* @var $model Periode */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_periode'); ?>
		<?php echo $form->textField($model,'id_periode'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nama_periode'); ?>
		<?php echo $form->textField($model,'nama_periode',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tahun'); ?>
		<?php echo $form->textField($model,'tahun',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal_buka'); ?>
		<?php echo $form->textField($model,'tanggal_buka'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tanggal_tutup'); ?>
		<?php echo $form->textField($model,'tanggal_tutup'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_aktivasi'); ?>
		<?php echo $form->textField($model,'status_aktivasi'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->