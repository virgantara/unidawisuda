<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{

	const ERROR_USER_INACTIVE = 3;
	const ERROR_USER_NOT_EXIST = 404;
	public $uuid;

	public function __construct($username, $password, $uuid='')
    {
        parent::__construct($username, $password);
        $this->uuid = $uuid;
    }

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = User::model()->findByAttributes(array('uuid' => $this->uuid));
		// print_r($this->uuid);exit;
		if(is_null($user))
		{

			$this->errorCode=self::ERROR_USER_NOT_EXIST;

		}
		
		else if($user->STATUS != 1){

			$this->errorCode=self::ERROR_USER_INACTIVE;
			
		}
		else{

			$this->errorCode=self::ERROR_NONE;
			$this->setState('isLogin',true);
			$this->setState('USERNAME', $user->USERNAME);
			$this->setState('LEVEL', $user->LEVEL);
		
		
		
		}


		return !$this->errorCode;
	}
}