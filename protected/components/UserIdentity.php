<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	private $_id;
	 private $_rolId;
	 private $_name;
	 private $_email;
	 private $_estado;
     public $_foto;
	public function authenticate()
	{
		/*$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users[$this->username]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;*/


		$user=Usuario::model()->findByAttributes(array('email'=>$this->username));
		if($user===null)
                {
                    $this->errorCode=self::ERROR_USERNAME_INVALID;
                }
                else
                {
                    if($user->password == 0)
                    {
                        $this->errorCode=self::ERROR_PASSWORD_INVALID;
                    }
                    else
                    {
                        $this->_id = $user->idusuario;
                        $this->_name = $user->idpersona0->nombres;
                        //Yii::app()->request->cookies['rolactualuser'] = new CHttpCookie('rolactualuser', $user->rol_idrol);
                        $this->errorCode=self::ERROR_NONE;
                    }
                }
		return !$this->errorCode;
	}
	public function getId()
    {
        return $this->_id;
    }
    public function getRol()
    {
        return $this->_rolId;
    }
    public function getName()
    {
        return $this->_name;
    }
    public function getEmail()
    {
        return $this->_email;
    }
    public function getEstado()
    {
        return $this->_foto;
    }
}