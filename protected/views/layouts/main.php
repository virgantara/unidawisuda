<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="language" content="en">

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print">
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection">
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css">
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css">

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body style="background-color: darkslategrey">

<div class="container" id="page">

	<div id="header">
		<div id="logo">
		<img src="<?php echo Yii::app()->baseUrl;?>/images/logo_baak.png" width="100%" />
		
			
		</div>
		<h2 style="background-color: #253b80;color: white;text-align: center;">Selamat Datang Para Wisudawan / Wisudawati</h2>
	</div><!-- header -->

	<div id="mainmenu">
		<?php 
		if(!Yii::app()->user->isGuest)
		{
		$this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'Export', 'url'=>array('/peserta/export')),
				array('label'=>'Periode', 'url'=>array('/periode/index')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),

		));

		} ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs) && !Yii::app()->user->isGuest):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Universitas Darussalam Gontor.<br/>
		All Rights Reserved.<br/>
		PPTIK - UNIDA Gontor
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
