<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
	public $user_name;
	public $user_pwd;
	public $rememberMe;
        public $verifyCode; //验证码属性
        
	private $_identity;

	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			// username and password are required
			array('user_name', 'required','message'=>'用户名必填'),
			array('user_pwd', 'required','message'=>'密码必填'),
			// rememberMe needs to be a boolean
			array('rememberMe', 'boolean'),
			// password needs to be authenticated
			//array('password', 'authenticate'),
                    //校验用户名和密码的真实性,通过自定义方法实现校验
                    array('user_pwd','authenticate'),
                    
                    //对验证码进行校验
                    array('verifyCode','captcha','message'=>'请输入正确的验证码'),
		);
	}
	/**
	 * Authenticates the password.
	 * This is the 'authenticate' validator as declared in rules().
	 */
	public function authenticate($attribute,$params)
	{
		if(!$this->hasErrors())
		{
			$this->_identity=new UserIdentity($this->user_name,$this->user_pwd);
			if(!$this->_identity->authenticate())
				$this->addError('user_pwd','用户名或密码不存在');
		}
	}
	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return array(
                    'user_name'=>'用户名',
                    'user_pwd'=>'密  码',
                    'verifyCode'=>'验证码',
                    'rememberMe'=>'记住登录状态',
		);
	}



	/**
	 * Logs in the user using the given username and password in the model.
	 * @return boolean whether login is successful
	 */
	public function login()
	{
		if($this->_identity===null)
		{
			$this->_identity=new UserIdentity($this->user_name,$this->user_pwd);
			$this->_identity->authenticate();
		}
		if($this->_identity->errorCode===UserIdentity::ERROR_NONE)
		{
			$duration=$this->rememberMe ? 3600*24*30 : 0; // 30 days
			Yii::app()->user->login($this->_identity,$duration);
			return true;
		}
		else
			return false;
	}
}
