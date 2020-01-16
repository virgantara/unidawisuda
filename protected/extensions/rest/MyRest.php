<?php

require_once "restclient.php";


class MyRest extends CApplicationComponent
{
	
	public $id = '';
	public $secretkey = '';
	public $baseurl = '';
	public $baseurl_apigateway = '';
	public $baseurlVClaim = '';
	public $baseurlAplicare = '';
	public $token = '';

	public static function getDataApi($url, $params)
	{
		$host = Yii::app()->rest->baseurl_apigateway;

		$url = $host.$url;
		$api = new RestClient;
		$headers = Yii::app()->rest->getHeader();
       	$result = $api->get($url, $params, $headers);		
       	
		try{
			$hasil = $result->decode_response();
			// print_r($hasil);exit;
		}

		catch(RestClientException  $e){
			// throw new RestClientException;
			$hasil = null;
		}
		
		return $hasil;
	} 

	public static function postDataApi($url, $params)
	{
		$host = Yii::app()->rest->baseurl_apigateway;

		$url = $host.$url;
		$api = new RestClient;
		
		$headers = Yii::app()->rest->getHeader();
		$result = $api->post($url, $params, $headers);		
		try{
			$hasil = $result->decode_response();
			
		}

		catch(RestClientException  $e){
			
    		
			// throw new RestClientException;
			$hasil = null;
		}
		
		return $hasil;
	} 
	
/*
=========================HEADER WS================================================
*/
	
	public static function getHeaderJson()
	{
		$data = Yii::app()->rest->id;
		$key = Yii::app()->rest->secretkey;
		$host = Yii::app()->rest->baseurl;

		date_default_timezone_set('UTC');
		$tStamp= strval(time()-strtotime('1970-01-01 00:00:00'));
		// Computes the signature by hashing the salt with the secret key as the key
		$signature= hash_hmac('sha256', $data."&".$tStamp, $key, true);
		// base64 encode…
		$encodedSignature= base64_encode($signature);
		

		return array(
			'x-cons-id' => $data,
			'x-timestamp' => $tStamp,
			'x-signature' => $encodedSignature,
			'Content-Type' => 'application/json; charset=utf-8'
		);
	}

	public static function getHeader()
	{

		return array(
			'x-access-token' => Yii::app()->rest->token,
			'Content-Type' => 'Application/x-www-form-urlencoded'
		);
	}
}