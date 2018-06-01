
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

$maklumat = '';
$batasupload = '';
foreach($settings as $setting)
{
  if($setting->kode_setting == 'MAKLUMAT')
  {
    $maklumat = $setting->konten;
  }

 
}
echo $maklumat;

$periode = Periode::model()->findByAttributes(array('status_aktivasi'=>'Y'));
$tgl_tutup = !empty($periode) ? $periode->tanggal_tutup : date('Y-m-d H:i:s');

$timenow = date('Y-m-d H:i:s');
$timebatas = date('Y-m-d H:i:s',strtotime($tgl_tutup));

$d1 = new DateTime($timenow);
$d2 = new DateTime($timebatas);

if($d1 <= $d2)
{
  
?>

<br>
<br>
<div align="center">
<a title="Registrasi Wisuda" href="<?php echo Yii::app()->createUrl('peserta/create');?>"><img src="<?php echo Yii::app()->baseUrl;?>/images/register.png"/></a>
</div>
<?php 
}
?>


