
<style type="text/css">
ol {
    list-style-type: lower-alpha;

    font-size : 16px;
    color : black;
}

li{
	padding-left: 10px;
	padding-bottom: 5px;
}

p,div{
	font-size : 16px;
  color : black;
}

</style>

<?php if(Yii::app()->user->hasFlash('success')){ ?>

<div class="flash-success">
  <?php echo Yii::app()->user->getFlash('success'); ?>
</div>

<?php

}


 ?>

<?php 
echo $setting->konten;
?>
<br>
<br>
<div align="center">
<a title="Registrasi Wisuda" href="<?php echo Yii::app()->createUrl('peserta/create');?>"><img src="<?php echo Yii::app()->baseUrl;?>/images/register.png"/></a>
</div>