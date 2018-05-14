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
				'actions'=>array('index','view','create','getProdi','setSessionNIM','uploadPasPhoto','uploadIjazah','uploadAkta','uploadKwitansiJilid','uploadSBP','uploadResume','uploadSBT','uploadTranskrip','uploadSKL','uploadKwitansiWisuda','uploadSuratJalan','uploadSkripsi','uploadAbstrak','export','uploadTandaKeluar',
					'uploadBuktiRevisiBahasa','uploadBuktiLayouter','uploadBuktiPerpus'
			),
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

	public function actionUploadBuktiPerpus()
	{
        Yii::import("ext.EAjaxUpload.qqFileUploader");
 		if(Yii::app()->user->hasState("nim"))
 		{
			$nim = 'bpp_'.Yii::app()->user->getState("nim");
	        $folder=Yii::app()->basePath.'/../uploads/bukti_perpus/';// folder for uploaded files
	        $allowedExtensions = array("pdf");//array("jpg","jpeg","gif","exe","mov" and etc...
	        $sizeLimit = 1 * 1024 * 1024;// maximum file size in bytes
	        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
	        $result = $uploader->handleUpload($folder,$nim,true);
	        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
	 
	        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
	        $fileName=$result['filename'];//GETTING FILE NAME
	 
	        echo $return;// it's array	 			
 		}

 		else{
 			$return = array(
 				'error' => 'NIM harus diisi dulu'
 			);

 			$return = htmlspecialchars(json_encode($return), ENT_NOQUOTES);
	 

 			echo $return;
 		}
	}

	public function actionUploadBuktiLayouter()
	{
        Yii::import("ext.EAjaxUpload.qqFileUploader");
 		if(Yii::app()->user->hasState("nim"))
 		{
			$nim = 'bly_'.Yii::app()->user->getState("nim");
	        $folder=Yii::app()->basePath.'/../uploads/bukti_layouter/';// folder for uploaded files
	        $allowedExtensions = array("pdf");//array("jpg","jpeg","gif","exe","mov" and etc...
	        $sizeLimit = 1 * 1024 * 1024;// maximum file size in bytes
	        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
	        $result = $uploader->handleUpload($folder,$nim,true);
	        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
	 
	        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
	        $fileName=$result['filename'];//GETTING FILE NAME
	 
	        echo $return;// it's array	 			
 		}

 		else{
 			$return = array(
 				'error' => 'NIM harus diisi dulu'
 			);

 			$return = htmlspecialchars(json_encode($return), ENT_NOQUOTES);
	 

 			echo $return;
 		}
	}

	public function actionUploadBuktiRevisiBahasa()
	{
        Yii::import("ext.EAjaxUpload.qqFileUploader");
 		if(Yii::app()->user->hasState("nim"))
 		{
			$nim = 'brb_'.Yii::app()->user->getState("nim");
	        $folder=Yii::app()->basePath.'/../uploads/bukti_revisi_bahasa/';// folder for uploaded files
	        $allowedExtensions = array("pdf");//array("jpg","jpeg","gif","exe","mov" and etc...
	        $sizeLimit = 1 * 1024 * 1024;// maximum file size in bytes
	        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
	        $result = $uploader->handleUpload($folder,$nim,true);
	        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
	 
	        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
	        $fileName=$result['filename'];//GETTING FILE NAME
	 
	        echo $return;// it's array	 			
 		}

 		else{
 			$return = array(
 				'error' => 'NIM harus diisi dulu'
 			);

 			$return = htmlspecialchars(json_encode($return), ENT_NOQUOTES);
	 

 			echo $return;
 		}
	}

	public function actionExport()
	{
		$this->layout = '';
		$model = Peserta::model()->findAll();

		$this->renderPartial('export',array(
			'model' => $model,
		));

		// $this->render('export',array(
		// 	$model
		// ));
	}

	public function actionUploadAbstrak()
	{
        Yii::import("ext.EAjaxUpload.qqFileUploader");
 		if(Yii::app()->user->hasState("nim"))
 		{
			$nim = 'abs_'.Yii::app()->user->getState("nim");
	        $folder=Yii::app()->basePath.'/../uploads/abstrak/';// folder for uploaded files
	        $allowedExtensions = array("doc");//array("jpg","jpeg","gif","exe","mov" and etc...
	        $sizeLimit = 10 * 1024 * 1024;// maximum file size in bytes
	        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
	        $result = $uploader->handleUpload($folder,$nim,true);
	        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
	 
	        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
	        $fileName=$result['filename'];//GETTING FILE NAME
	 
	        echo $return;// it's array	 			
 		}

 		else{
 			$return = array(
 				'error' => 'NIM harus diisi dulu'
 			);

 			$return = htmlspecialchars(json_encode($return), ENT_NOQUOTES);
	 

 			echo $return;
 		}
	}

	public function actionUploadSkripsi()
	{
        Yii::import("ext.EAjaxUpload.qqFileUploader");
 		if(Yii::app()->user->hasState("nim"))
 		{
			$nim = 's_'.Yii::app()->user->getState("nim");
	        $folder=Yii::app()->basePath.'/../uploads/skripsi/';// folder for uploaded files
	        $allowedExtensions = array("pdf");//array("jpg","jpeg","gif","exe","mov" and etc...
	        $sizeLimit = 10 * 1024 * 1024;// maximum file size in bytes
	        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
	        $result = $uploader->handleUpload($folder,$nim,true);
	        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
	 
	        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
	        $fileName=$result['filename'];//GETTING FILE NAME
	 
	        echo $return;// it's array	 			
 		}

 		else{
 			$return = array(
 				'error' => 'NIM harus diisi dulu'
 			);

 			$return = htmlspecialchars(json_encode($return), ENT_NOQUOTES);
	 

 			echo $return;
 		}
	}

	public function actionUploadSuratJalan()
	{
        Yii::import("ext.EAjaxUpload.qqFileUploader");
 		if(Yii::app()->user->hasState("nim"))
 		{
			$nim = 'sj_'.Yii::app()->user->getState("nim");
	        $folder=Yii::app()->basePath.'/../uploads/surat_jalan/';// folder for uploaded files
	        $allowedExtensions = array("jpg","png","pdf");//array("jpg","jpeg","gif","exe","mov" and etc...
	        $sizeLimit = 2 * 1024 * 1024;// maximum file size in bytes
	        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
	        $result = $uploader->handleUpload($folder,$nim,true);
	        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
	 
	        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
	        $fileName=$result['filename'];//GETTING FILE NAME
	 
	        echo $return;// it's array	 			
 		}

 		else{
 			$return = array(
 				'error' => 'NIM harus diisi dulu'
 			);

 			$return = htmlspecialchars(json_encode($return), ENT_NOQUOTES);
	 

 			echo $return;
 		}
	}


	public function actionUploadTandaKeluar()
	{
        Yii::import("ext.EAjaxUpload.qqFileUploader");
 		if(Yii::app()->user->hasState("nim"))
 		{
			$nim = 'tnd_'.Yii::app()->user->getState("nim");
	        $folder=Yii::app()->basePath.'/../uploads/tanda_keluar_asrama/';// folder for uploaded files
	        $allowedExtensions = array("jpg","png","pdf");//array("jpg","jpeg","gif","exe","mov" and etc...
	        $sizeLimit = 2 * 1024 * 1024;// maximum file size in bytes
	        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
	        $result = $uploader->handleUpload($folder,$nim,true);
	        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
	 
	        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
	        $fileName=$result['filename'];//GETTING FILE NAME
	 
	        echo $return;// it's array	 			
 		}

 		else{
 			$return = array(
 				'error' => 'NIM harus diisi dulu'
 			);

 			$return = htmlspecialchars(json_encode($return), ENT_NOQUOTES);
	 

 			echo $return;
 		}
	}

	public function actionUploadKwitansiWisuda()
	{
        Yii::import("ext.EAjaxUpload.qqFileUploader");
 		if(Yii::app()->user->hasState("nim"))
 		{
			$nim = 'wsd_'.Yii::app()->user->getState("nim");
	        $folder=Yii::app()->basePath.'/../uploads/kwitansi_wisuda/';// folder for uploaded files
	        $allowedExtensions = array("jpg","png","pdf");//array("jpg","jpeg","gif","exe","mov" and etc...
	        $sizeLimit = 2 * 1024 * 1024;// maximum file size in bytes
	        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
	        $result = $uploader->handleUpload($folder,$nim,true);
	        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
	 
	        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
	        $fileName=$result['filename'];//GETTING FILE NAME
	 
	        echo $return;// it's array	 			
 		}

 		else{
 			$return = array(
 				'error' => 'NIM harus diisi dulu'
 			);

 			$return = htmlspecialchars(json_encode($return), ENT_NOQUOTES);
	 

 			echo $return;
 		}
	}

	public function actionUploadSKL()
	{
	        Yii::import("ext.EAjaxUpload.qqFileUploader");
	 		if(Yii::app()->user->hasState("nim"))
	 		{
				$nim = 'skl_'.Yii::app()->user->getState("nim");
		        $folder=Yii::app()->basePath.'/../uploads/skl_tahfidz/';// folder for uploaded files
		        $allowedExtensions = array("jpg","png","pdf");//array("jpg","jpeg","gif","exe","mov" and etc...
		        $sizeLimit = 2 * 1024 * 1024;// maximum file size in bytes
		        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
		        $result = $uploader->handleUpload($folder,$nim,true);
		        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
		 
		        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
		        $fileName=$result['filename'];//GETTING FILE NAME
		 
		        echo $return;// it's array	 			
	 		}

	 		else{
	 			$return = array(
	 				'error' => 'NIM harus diisi dulu'
	 			);

	 			$return = htmlspecialchars(json_encode($return), ENT_NOQUOTES);
		 

	 			echo $return;
	 		}
	}

	public function actionUploadTranskrip()
	{
	        Yii::import("ext.EAjaxUpload.qqFileUploader");
	 		if(Yii::app()->user->hasState("nim"))
	 		{
				$nim = 'trs_'.Yii::app()->user->getState("nim");
		        $folder=Yii::app()->basePath.'/../uploads/transkrip/';// folder for uploaded files
		        $allowedExtensions = array("jpg","png","pdf");//array("jpg","jpeg","gif","exe","mov" and etc...
		        $sizeLimit = 2 * 1024 * 1024;// maximum file size in bytes
		        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
		        $result = $uploader->handleUpload($folder,$nim,true);
		        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
		 
		        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
		        $fileName=$result['filename'];//GETTING FILE NAME
		 
		        echo $return;// it's array	 			
	 		}

	 		else{
	 			$return = array(
	 				'error' => 'NIM harus diisi dulu'
	 			);

	 			$return = htmlspecialchars(json_encode($return), ENT_NOQUOTES);
		 

	 			echo $return;
	 		}
	}

	public function actionUploadSBT()
	{
	        Yii::import("ext.EAjaxUpload.qqFileUploader");
	 		if(Yii::app()->user->hasState("nim"))
	 		{
				$nim = 'sbt_'.Yii::app()->user->getState("nim");
		        $folder=Yii::app()->basePath.'/../uploads/surat_bebas_tunggakan/';// folder for uploaded files
		        $allowedExtensions = array("jpg","png","pdf");//array("jpg","jpeg","gif","exe","mov" and etc...
		        $sizeLimit = 2 * 1024 * 1024;// maximum file size in bytes
		        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
		        $result = $uploader->handleUpload($folder,$nim,true);
		        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
		 
		        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
		        $fileName=$result['filename'];//GETTING FILE NAME
		 
		        echo $return;// it's array	 			
	 		}

	 		else{
	 			$return = array(
	 				'error' => 'NIM harus diisi dulu'
	 			);

	 			$return = htmlspecialchars(json_encode($return), ENT_NOQUOTES);
		 

	 			echo $return;
	 		}
	}

	public function actionUploadResume()
	{
	        Yii::import("ext.EAjaxUpload.qqFileUploader");
	 		if(Yii::app()->user->hasState("nim"))
	 		{
				$nim = 'res_'.Yii::app()->user->getState("nim");
		        $folder=Yii::app()->basePath.'/../uploads/resume_skripsi/';// folder for uploaded files
		        $allowedExtensions = array("doc");//array("jpg","jpeg","gif","exe","mov" and etc...
		        $sizeLimit = 10 * 1024 * 1024;// maximum file size in bytes
		        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
		        $result = $uploader->handleUpload($folder,$nim,true);
		        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
		 
		        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
		        $fileName=$result['filename'];//GETTING FILE NAME
		 
		        echo $return;// it's array	 			
	 		}

	 		else{
	 			$return = array(
	 				'error' => 'NIM harus diisi dulu'
	 			);

	 			$return = htmlspecialchars(json_encode($return), ENT_NOQUOTES);
		 

	 			echo $return;
	 		}


	}

	public function actionUploadSBP()
	{
	        Yii::import("ext.EAjaxUpload.qqFileUploader");
	 		if(Yii::app()->user->hasState("nim"))
	 		{
				$nim = 'sbp_'.Yii::app()->user->getState("nim");
		        $folder=Yii::app()->basePath.'/../uploads/surat_bebas_pinjaman/';// folder for uploaded files
		        $allowedExtensions = array("pdf");//array("jpg","jpeg","gif","exe","mov" and etc...
		        $sizeLimit = 2 * 1024 * 1024;// maximum file size in bytes
		        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
		        $result = $uploader->handleUpload($folder,$nim,true);
		        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
		 
		        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
		        $fileName=$result['filename'];//GETTING FILE NAME
		 
		        echo $return;// it's array	 			
	 		}

	 		else{
	 			$return = array(
	 				'error' => 'NIM harus diisi dulu'
	 			);

	 			$return = htmlspecialchars(json_encode($return), ENT_NOQUOTES);
		 

	 			echo $return;
	 		}


	}

	public function actionUploadKwitansiJilid()
	{
	        Yii::import("ext.EAjaxUpload.qqFileUploader");
	 		if(Yii::app()->user->hasState("nim"))
	 		{
				$nim = 'kj_'.Yii::app()->user->getState("nim");
		        $folder=Yii::app()->basePath.'/../uploads/kwitansi_jilid/';// folder for uploaded files
		        $allowedExtensions = array("jpg","png","pdf");//array("jpg","jpeg","gif","exe","mov" and etc...
		        $sizeLimit = 2 * 1024 * 1024;// maximum file size in bytes
		        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
		        $result = $uploader->handleUpload($folder,$nim,true);
		        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
		 
		        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
		        $fileName=$result['filename'];//GETTING FILE NAME
		 
		        echo $return;// it's array	 			
	 		}

	 		else{
	 			$return = array(
	 				'error' => 'NIM harus diisi dulu'
	 			);

	 			$return = htmlspecialchars(json_encode($return), ENT_NOQUOTES);
		 

	 			echo $return;
	 		}


	}

	public function actionUploadAkta()
	{
	        Yii::import("ext.EAjaxUpload.qqFileUploader");
	 		if(Yii::app()->user->hasState("nim"))
	 		{
				$nim = 'akta_'.Yii::app()->user->getState("nim");
		        $folder=Yii::app()->basePath.'/../uploads/akta_kelahiran/';// folder for uploaded files
		        $allowedExtensions = array("jpg","png","pdf");//array("jpg","jpeg","gif","exe","mov" and etc...
		        $sizeLimit = 2 * 1024 * 1024;// maximum file size in bytes
		        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
		        $result = $uploader->handleUpload($folder,$nim,true);
		        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
		 
		        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
		        $fileName=$result['filename'];//GETTING FILE NAME
		 
		        echo $return;// it's array	 			
	 		}

	 		else{
	 			$return = array(
	 				'error' => 'NIM harus diisi dulu'
	 			);

	 			$return = htmlspecialchars(json_encode($return), ENT_NOQUOTES);
		 

	 			echo $return;
	 		}


	}
	
	public function actionUploadIjazah()
	{
	        Yii::import("ext.EAjaxUpload.qqFileUploader");
	 		if(Yii::app()->user->hasState("nim"))
	 		{
				$nim = 'ijz_'.Yii::app()->user->getState("nim");
		        $folder=Yii::app()->basePath.'/../uploads/ijazah/';// folder for uploaded files
		        $allowedExtensions = array("jpg","png","pdf");//array("jpg","jpeg","gif","exe","mov" and etc...
		        $sizeLimit = 2 * 1024 * 1024;// maximum file size in bytes
		        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
		        $result = $uploader->handleUpload($folder,$nim,true);
		        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
		 
		        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
		        $fileName=$result['filename'];//GETTING FILE NAME
		 
		        echo $return;// it's array	 			
	 		}

	 		else{
	 			$return = array(
	 				'error' => 'NIM harus diisi dulu'
	 			);

	 			$return = htmlspecialchars(json_encode($return), ENT_NOQUOTES);
		 

	 			echo $return;
	 		}


	}

	public function actionUploadPasPhoto()
	{
	        Yii::import("ext.EAjaxUpload.qqFileUploader");
	 		if(Yii::app()->user->hasState("nim"))
	 		{
				$nim = 'foto_'.Yii::app()->user->getState("nim");
		        $folder=Yii::app()->basePath.'/../uploads/pas_photo/';// folder for uploaded files
		        $allowedExtensions = array("jpg","png");//array("jpg","jpeg","gif","exe","mov" and etc...
		        $sizeLimit = 2 * 1024 * 1024;// maximum file size in bytes
		        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
		        $result = $uploader->handleUpload($folder,$nim,true);
		        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);
		 
		        $fileSize=filesize($folder.$result['filename']);//GETTING FILE SIZE
		        $fileName=$result['filename'];//GETTING FILE NAME
		 
		        echo $return;// it's array	 			
	 		}

	 		else{
	 			$return = array(
	 				'error' => 'NIM harus diisi dulu'
	 			);

	 			$return = htmlspecialchars(json_encode($return), ENT_NOQUOTES);
		 

	 			echo $return;
	 		}


	}

	public function actionSetSessionNIM()
	{

		$nim = $_POST['nim'];
		if(!empty($nim))
 			Yii::app()->user->setState("nim", $nim);
 		else
 			Yii::app()->user->setState("nim", null);
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
		$settings = Setting::model()->findAll();

		$maklumat = '';
		$batasupload = '';
		foreach($settings as $setting)
		{
		  if($setting->kode_setting == 'MAKLUMAT')
		  {
		    $maklumat = $setting->konten;
		  }

		  else if($setting->kode_setting == 'BATASUPLOAD')
		  {
		    $batasupload = $setting->konten;
		  }
		}
		// echo $maklumat;


		$timenow = date('Y-m-d H:i:s');
		$timebatas = date('Y-m-d H:i:s',strtotime($batasupload));

		$d1 = new DateTime($timenow);
		$d2 = new DateTime($timebatas);

		if($d1 <= $d2)
		{
			$model=new Peserta;

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Peserta']))
			{
				$model->attributes=$_POST['Peserta'];
	           
				if($model->save()){
					Yii::app()->user->setFlash('success','Terima kasih telah mendaftar');
					$this->redirect(array('peserta/index'));
				}
			}

			$this->render('create',array(
				'model'=>$model,
			));
		}

		else
		{
			echo 'Melebihi batas waktu UPLOAD';
		}
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
		$this->layout = "//layouts/column1";

		$settings = Setting::model()->findAll();

		$this->render('index',array(
			'settings' => $settings
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
