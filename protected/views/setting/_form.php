<?php
/* @var $this SettingController */
/* @var $model Setting */
/* @var $form CActiveForm */
?>

  <script type="text/javascript">
  window.onload = function()
	{
<?php 
	if($model->isNewRecord || $model->kode_setting == 'MAKLUMAT')
	{
	?>

		CKEDITOR.replace( 'Setting_konten' ,{
			extraPlugins: 'font,colorbutton',
		} );

	};
	<?php 
}
	?>
</script>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'setting-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'kode_setting'); ?>
		<?php echo $form->textField($model,'kode_setting',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'kode_setting'); ?>
	</div>

	
	<div class="row">
		<?php echo $form->labelEx($model,'konten'); ?>
		<?php echo $form->textArea($model,'konten',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'konten'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->