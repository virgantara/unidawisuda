<?php

class PesertaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create','getProdi'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionGetProdi()
	{
		$nama = $_POST['nama'];

		$fak = Fakultas::model()->findByAttributes(array('nama_fakultas'=>$nama));
		
		$model = Prodi::model()->findAllByAttributes(array('kode_fakultas'=>$fak->kode_fakultas));

		$hasil = array();
		foreach($model as $m)
		{

			$hasil[] = array(
				'kode' => $m->id_prodi,
				'nama' => $m->nama_prodi
			);
		}



		echo json_encode($hasil);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Peserta;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Peserta']))
		{
			$model->attributes=$_POST['Peserta'];

			$model->pas_photo = CUploadedFile::getInstance($model, 'pas_photo');
			if ($model->validate(array('pas_photo'))) {
                $type = $model->pas_photo->getExtensionName();
	            $filename = 'pas_photo_'.$model->nim.'.'.$type;
	            $model->pas_photo->saveAs(Yii::app()->basePath.'/uploads/pas_photo/'.$filename);
	            $model->pas_photo = $filename;
            } 
            

            // ################## IJAZAH
            $model->ijazah = CUploadedFile::getInstance($model, 'ijazah');
			if ($model->validate(array('ijazah'))) {
                
            	$type = $model->ijazah->getExtensionName();
	            $filename = 'ijazah_'.$model->nim.'.'.$type;
	            $model->ijazah->saveAs(Yii::app()->basePath.'/uploads/ijazah/'.$filename);
	            $model->ijazah = $filename;
            } 
            

            // ################## akta_kelahiran
            $model->akta_kelahiran = CUploadedFile::getInstance($model, 'akta_kelahiran');
			if ($model->validate(array('akta_kelahiran'))) {
                $type = $model->akta_kelahiran->getExtensionName();
	            $filename = 'akta_kelahiran_'.$model->nim.'.'.$type;
	            $model->akta_kelahiran->saveAs(Yii::app()->basePath.'/uploads/akta_kelahiran/'.$filename);
	            $model->akta_kelahiran = $filename;
            } 

            

            // ################## kwitansi_jilid
            $model->kwitansi_jilid = CUploadedFile::getInstance($model, 'kwitansi_jilid');
			if ($model->validate(array('kwitansi_jilid'))) {

                $type = $model->kwitansi_jilid->getExtensionName();
	            $filename = 'kwitansi_jilid_'.$model->nim.'.'.$type;
	            $model->kwitansi_jilid->saveAs(Yii::app()->basePath.'/uploads/kwitansi_jilid/'.$filename);
	            $model->kwitansi_jilid = $filename;
            } 
            

            // ################## surat_bebas_pinjaman
            $model->surat_bebas_pinjaman = CUploadedFile::getInstance($model, 'surat_bebas_pinjaman');
			if ($model->validate(array('surat_bebas_pinjaman'))) {

                $type = $model->surat_bebas_pinjaman->getExtensionName();
	            $filename = 'surat_bebas_pinjaman_'.$model->nim.'.'.$type;
	            $model->surat_bebas_pinjaman->saveAs(Yii::app()->basePath.'/uploads/surat_bebas_pinjaman/'.$filename);
	            $model->surat_bebas_pinjaman = $filename;
            } 

            

            // ################## resume_skripsi
            $model->resume_skripsi = CUploadedFile::getInstance($model, 'resume_skripsi');
			if ($model->validate(array('resume_skripsi'))) {

 				$type = $model->resume_skripsi->getExtensionName();
	            $filename = 'resume_skripsi_'.$model->nim.'.'.$type;
	            $model->resume_skripsi->saveAs(Yii::app()->basePath.'/uploads/resume_skripsi/'.$filename);
	            $model->resume_skripsi = $filename;
            }

            

            // ################## surat_bebas_tunggakan
            $model->surat_bebas_tunggakan = CUploadedFile::getInstance($model, 'surat_bebas_tunggakan');
			if ($model->validate(array('surat_bebas_tunggakan'))) {

            	 $type = $model->surat_bebas_tunggakan->getExtensionName();
	            $filename = 'surat_bebas_tunggakan_'.$model->nim.'.'.$type;
	            $model->surat_bebas_tunggakan->saveAs(Yii::app()->basePath.'/uploads/surat_bebas_tunggakan/'.$filename);
	            $model->surat_bebas_tunggakan = $filename;

            } 


           
            // ################## transkrip
            $model->transkrip = CUploadedFile::getInstance($model, 'transkrip');
			if ($model->validate(array('transkrip'))) {

                 $type = $model->transkrip->getExtensionName();
	            $filename = 'transkrip_'.$model->nim.'.'.$type;
	            $model->transkrip->saveAs(Yii::app()->basePath.'/uploads/transkrip/'.$filename);
	            $model->transkrip = $filename;
            } 

           

             // ################## skl_tahfidz
            $model->skl_tahfidz = CUploadedFile::getInstance($model, 'skl_tahfidz');
			if ($model->validate(array('skl_tahfidz'))) {
               
                $type = $model->skl_tahfidz->getExtensionName();
	            $filename = 'skl_tahfidz_'.$model->nim.'.'.$type;
	            $model->skl_tahfidz->saveAs(Yii::app()->basePath.'/uploads/skl_tahfidz/'.$filename);
	            $model->skl_tahfidz = $filename;
            }

           

             // ################## kwitansi_wisuda
            $model->kwitansi_wisuda = CUploadedFile::getInstance($model, 'kwitansi_wisuda');
			if ($model->validate(array('kwitansi_wisuda'))) {
                
                 $type = $model->kwitansi_wisuda->getExtensionName();
	            $filename = 'kwitansi_wisuda_'.$model->nim.'.'.$type;
	            $model->kwitansi_wisuda->saveAs(Yii::app()->basePath.'/uploads/kwitansi_wisuda/'.$filename);
	            $model->kwitansi_wisuda = $filename;
            } 

           

             // ################## tanda_keluar_asrama
            $model->tanda_keluar_asrama = CUploadedFile::getInstance($model, 'tanda_keluar_asrama');
			if ($model->validate(array('tanda_keluar_asrama'))) {
                if(!empty($model->tanda_keluar_asrama)){
	            	$type = $model->tanda_keluar_asrama->getExtensionName();
		            $filename = 'tanda_keluar_asrama_'.$model->nim.'.'.$type;
		            $model->tanda_keluar_asrama->saveAs(Yii::app()->basePath.'/uploads/tanda_keluar_asrama/'.$filename);
		            $model->tanda_keluar_asrama = $filename;
		        }
            } 

            

              // ################## surat_jalan
            $model->surat_jalan = CUploadedFile::getInstance($model, 'surat_jalan');
			if ($model->validate(array('surat_jalan'))) {
                
                if(!empty($model->surat_jalan)){
                	$type = $model->surat_jalan->getExtensionName();
		            $filename = 'surat_jalan_'.$model->nim.'.'.$type;
		            $model->surat_jalan->saveAs(Yii::app()->basePath.'/uploads/surat_jalan/'.$filename);
		            $model->surat_jalan = $filename;
		        }
            }
            

              // ################## skripsi
            $model->skripsi = CUploadedFile::getInstance($model, 'skripsi');
			if ($model->validate(array('skripsi'))) {
                $type = $model->skripsi->getExtensionName();
	            $filename = 'skripsi_'.$model->nim.'.'.$type;
	            $model->skripsi->saveAs(Yii::app()->basePath.'/uploads/skripsi/'.$filename);
	            $model->skripsi = $filename;
            } 

           

             // ################## abstrak
            $model->abstrak = CUploadedFile::getInstance($model, 'abstrak');
			if ($model->validate(array('abstrak'))) {
                
                $type = $model->abstrak->getExtensionName();
	            $filename = 'abstrak_'.$model->nim.'.'.$type;
	            $model->abstrak->saveAs(Yii::app()->basePath.'/uploads/abstrak/'.$filename);
	            $model->abstrakab = $filename;
            } 

           
			if($model->save()){
				Yii::app()->user->setFlash('success','Terima kasih telah mendaftar');
				$this->redirect(array('peserta/create'));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Peserta']))
		{
			$model->attributes=$_POST['Peserta'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Peserta');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Peserta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Peserta']))
			$model->attributes=$_GET['Peserta'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Peserta the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Peserta::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Peserta $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='peserta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
