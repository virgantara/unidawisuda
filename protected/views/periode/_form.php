<?php
/* @var $this PeriodeController */
/* @var $model Periode */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'periode-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nama_periode'); ?>
		<?php echo $form->textField($model,'nama_periode',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nama_periode'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tahun'); ?>
		<?php echo $form->textField($model,'tahun',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'tahun'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_buka'); ?>
		
		<?php 
		 $this->widget('application.extensions.timepicker.EJuiDateTimePicker',array(
                    'model'=>$model,
                    'attribute'=>'tanggal_buka',
                    'options'=>array(
                       'showAnim'=>'slide',
                        'showSecond'=>true,
                        'timeFormat' => 'hh:mm:ss',
                        'dateFormat'=>'yy-mm-dd',
                        'changeMonth' => true,
                        'changeYear' => true,
                        
                    ),
        	));
		?>
		<?php echo $form->error($model,'tanggal_buka'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tanggal_tutup'); ?>
		<?php 
		 $this->widget('application.extensions.timepicker.EJuiDateTimePicker',array(
                    'model'=>$model,
                    'attribute'=>'tanggal_tutup',
                    'options'=>array(
                       'showAnim'=>'slide',
                        'showSecond'=>true,
                        'timeFormat' => 'hh:mm:ss',
                        'dateFormat'=>'yy-mm-dd',
                        'changeMonth' => true,
                        'changeYear' => true,
                        
                    ),
        	));
		?>
		<?php echo $form->error($model,'tanggal_tutup'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status_aktivasi'); ?>
		<?php echo $form->dropDownList($model,'status_aktivasi',array('Y'=>'Buka','N'=>'Tutup')); ?>
		<?php echo $form->error($model,'status_aktivasi'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->