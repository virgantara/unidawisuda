<?php

class AjaxRequestController extends Controller
{

	
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

	public function actionGetProfilMhs()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			$results = [];
			
			$url = "/m/profil/nim";
			$q = $_POST['nim'];
			$params = [
				'nim' => $q,
				// 'jenis' => $_GET['jenis']
			];
				
			$result = Yii::app()->rest->getDataApi($url,$params);
			// print_r($params);exit;

			$results['mhs'] = [];
			$results['ortu'] = [];
			if(!empty($result->values[0]))
			{
				$results['mhs'] = $result->values[0];

			}

			$url = "/m/ortu";
			// $q = $_POST['nim'];
			$params = [
				'nim' => $q,
				// 'jenis' => $_GET['jenis']
			];
				
			$result = Yii::app()->rest->getDataApi($url,$params);
			// print_r($params);exit;

			if(!empty($result->values))
			{
				$results['ortu'] = $result->values;

			}

			// header("Content-type: text/json");
			echo CJSON::encode($results);
		}
	}

	public function actionGetProdiByFakultas()
	{
		if(Yii::app()->request->isAjaxRequest)
		{
			$results = [];
			
			$url = "/f/prodi";
			$q = $_POST['kode'];
			$params = [
				'kode' => $_POST['kode'],

			];
				
			$result = Yii::app()->rest->getDataApi($url,$params);
			// print_r($params);exit;


			if(!empty($result->values))
			{
				$results = $result->values;

			}

			
			// header("Content-type: text/json");
			echo CJSON::encode($results);
		}
	}


}