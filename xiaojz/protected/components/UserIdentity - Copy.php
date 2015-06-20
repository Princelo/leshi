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
    public $user_name;
    public $user_pwd;
    public function __construct($user_name, $user_pwd){
        $this->user_name=$user_name;
        $this->user_pwd=$user_pwd;
    }

	public function authenticate()
	{
            //在这个地方来校验用户名和密码的真实性
            //首先来看看是否有此用户名存在
            //find() 如果没有查询出来数据，则会返回null
            //findAll()  空数据会返回空数组
        //根据用户名查询是否有一个用户信息
            $_mysqli1=new mysqli('localhost', 'root', 'sise', 'liyajie');
            $_mysqli2=new mysqli('localhost', 'root', 'sise', 'xiaojz');
            $_sql = "SELECT user_pwd FROM fanwe_user WHERE user_name = '{$this->user_name}';";
            $_sql2 = "SELECT user_pwd FROM xiaojz_user WHERE user_name = '{$this->user_name}';";
            $_result1 = $_mysqli1->query($_sql)->fetch_array();
            $_result2 = $_mysqli2->query($_sql2)->fetch_array();
            //$user_model = User::model()->find('user_name=:name',array(':name'=>$this->user_name));
            //print_r($user_model);
            $xiaojz = ($_result2['user_pwd'] != md5($this -> user_pwd));
            $leshi = ($_result1['user_pwd'] != md5($this -> user_pwd));
            //if($leshi)exit;
            //print_r( md5($this->user_pwd));exit;
            //如果用户名不存在
            //if($user_model == null){
            if(false){
                $this -> errorCode = self::ERROR_USERNAME_INVALID;
                return false;
            } else if ($leshi && $xiaojz){
                //密码判断
                $this->errorCode=self::ERROR_PASSWORD_INVALID;
                return false;
            } else {
                $this->errorCode=self::ERROR_NONE;
                return true;
            }
            
//		if(!isset($users[$this->username]))
//			$this->errorCode=self::ERROR_USERNAME_INVALID;
//		elseif($users[$this->username]!==$this->password)
//			$this->errorCode=self::ERROR_PASSWORD_INVALID;
//		else
//			$this->errorCode=self::ERROR_NONE;
//		return !$this->errorCode;
	}
}
/**
 * 
 **/
