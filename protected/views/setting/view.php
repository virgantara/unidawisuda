<?php
/* @var $this SettingController */
/* @var $model Setting */

$this->breadcrumbs=array(
	'Settings'=>array('index'),
	$model->id_post,
);

$this->menu=array(
	array('label'=>'List Setting', 'url'=>array('index')),
	array('label'=>'Create Setting', 'url'=>array('create')),
	array('label'=>'Update Setting', 'url'=>array('update', 'id'=>$model->id_post)),
	array('label'=>'Delete Setting', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_post),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Setting', 'url'=>array('admin')),
);
?>

<h1>View Setting #<?php echo $model->id_post; ?></h1>

<?php 
echo $model->konten;
 ?>
